<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Terms;
use App\Meta;
use App\Category;
use App\Postcategory;
use App\Models\Postcategoryoption;
use App\Models\User;
use App\Models\Termrelation;
use App\Models\Price;
use Str;
use Session;
class PropertyController extends controller
{
	 protected $term_id;
    protected $property_type;

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type="all")
    {

        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }
        if ($request->src && $request->type=='email') {
            $this->email=$request->src;
            $posts=Terms::where('type','property')->whereHas('user',function($q){
                return $q->where('email',$this->email);
            })->latest()->paginate(40);
        }
        elseif ($request->src) {
            $posts=Terms::where('type','property')->where($request->type,'LIKE','%'.$request->src.'%')->latest()->paginate(40);
        }
        else{
            $posts=Terms::where('type','property')->latest()->paginate(40);
        }
        $totals=Terms::where('type','property')->count();
        $actives=Terms::where([
            ['type','property'],
            ['status',1],
        ])->count();
        $incomplete=Terms::where([
            ['type','property'],
            ['status',2],
        ])->count();
        $trash=Terms::where([
            ['type','property'],
            ['status',0],
        ])->count();
        $pendings=Terms::where([
            ['type','property'],
            ['status',3],
        ])->count();
        $rejected=Terms::where([
            ['type','property'],
            ['status',4],
        ])->count();
        return view('plugin::properties.index',compact('type','posts','totals','pendings','actives','incomplete','trash','pendings','request','rejected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('Properties.create')) {
            abort(401);
        }
         return view('plugin::properties.create');
    }

    public function findUser(Request $request)
    {
        
        $user=User::where('role_id',2)->where('email',$request->email)->first();
        if (empty($user)) {
            $data['errors']['user']='User Not Found';
            return response()->json($data,401);
        }
        return response()->json($user);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'title' => 'required|max:255',
        'type' => 'required',
        'user_id' => 'required',
        'max_price' => 'required',
        'min_price' => 'required',
       ]);

        $slug=Str::slug($request->title);
        $count=Terms::where('type','property')->where('slug',$slug)->count();
        if ($count > 0) {
            $slug=$slug.'-'.rand(40,60).$count;
        }

        $term=new Terms;
        $term->title=$request->title;
        $term->slug=$slug;
        $term->user_id =$request->user_id;
        $term->status = 2;
        $term->type = 'property';
        $term->save();

        $meta=new Meta;
        $meta->term_id=$term->id;
        $meta->type='excerpt';
        $meta->content='';
        $meta->save();

        $meta=new Meta;
        $meta->term_id=$term->id;
        $meta->type='content';
        $meta->content='';
        $meta->save();

        $min_price= new Price;
        $min_price->type="min_price";
        $min_price->term_id=$term->id;
        $min_price->price=$request->min_price;
        $min_price->save();

        $max_price= new Price;
        $max_price->type= "max_price";
        $max_price->term_id=$term->id;
        $max_price->price=$request->max_price;
        $max_price->save();
        

        $cat=PostCategory::insert(['term_id'=>$term->id,'category_id'=>$request->type]);
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Project Created Successfully"
        ]);
        
        return redirect()->route('admin.property.edit',$term->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }

        if ($request->src && $request->type=='email') {
            $this->email=$request->src;
            $posts=Terms::where('type','property')->whereHas('user',function($q){
                return $q->where('email',$this->email);
            })->where('status',$id)->latest()->paginate(40);
        }
        elseif ($request->src) {
            $posts=Terms::where('type','property')->where('status',$id)->where($request->type,'LIKE','%'.$request->src.'%')->latest()->paginate(40);
        }
        else{
            $posts=Terms::where('type','property')->where('status',$id)->latest()->paginate(40);
        }
        $totals=Terms::where('type','property')->count();
        $actives=Terms::where([
            ['type','property'],
            ['status',1],
        ])->count();
        $incomplete=Terms::where([
            ['type','property'],
            ['status',2],
        ])->count();
        $trash=Terms::where([
            ['type','property'],
            ['status',0],
        ])->count();
        $pendings=Terms::where([
            ['type','property'],
            ['status',3],
        ])->count();
        $rejected=Terms::where([
            ['type','property'],
            ['status',4],
        ])->count();

        $type=$id;
        return view('plugin::properties.index',compact('type','posts','totals','pendings','actives','incomplete','trash','pendings','request','rejected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!Auth()->user()->can('Properties.edit')) {
            abort(401);
        }

        $this->term_id=$id;
         $info=Terms::with('excerpt','content','postcategory','latitude','longitude','city','medias','facilities','options','child')->find($id);
        $input_options=\App\Category::where('type','option')->with(['post_category_option'=>function($q){
            return $q->where('term_id',$this->term_id);
        }])->get();
       
        $array=[];
        $property_type=null;
        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
            if ($value->type=='category') {
               $this->property_type=$value->category_id;
            }
        }
        
       
        foreach ($info->facilities as $key => $row) {
            array_push($array, $row->category_id);
        }

        $input_options=\App\Category::where('type','option')->whereHas('child',function($q){
            return $q->where('id',$this->property_type);
        })->with(['post_category_option'=>function($q){
            return $q->where('term_id',$this->term_id);
        }])->get();

       if (count($input_options) == 0) {
            $input_options=Category::where('type','option')->whereHas('post_category_option',function($q){
            return $q->where('term_id',$this->term_id);
            })->with(['post_category_option'=>function($q){
            return $q->where('term_id',$this->term_id);
            }])->get();
        }

        $facilities=\App\Category::where('type','facilities')->get();

        $child=$info->child->child_id ?? null;
        return view('plugin::properties.edit',compact('info','input_options','array','facilities','child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $validatedData = $request->validate([
            'name' => 'required|max:100',
            
            'description' => 'max:500',
           
        ]);

         
        $term=Terms::find($id);
        $term->title=$request->name;
        $term->status=$request->moderation_status;
        $term->featured=$request->featured;
        $term->save();

       
        return response()->json(['Property Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('Properties.delete')) {
            abort(401);
        }

          if ($request->method=='delete') {
             if ($request->ids) {
                foreach ($request->ids as $id) {
                    Terms::destroy($id);
                }
             }
        }
        elseif(!empty($request->method)){
             if ($request->ids) {
                if ($request->method=="trash") {
                    $method=0; 
                }
                else{
                   $method=$request->method; 
                }
                
                foreach ($request->ids as $id) {
                    $term=Terms::find($id);
                    $term->status=$method;
                    $term->save();
                }
             }
        }

        return response()->json(['Success']);
    }
}