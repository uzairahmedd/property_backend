<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Meta;
use App\Category;
use App\Postcategory;
use App\Models\Postcategoryoption;
use Session;
use Str;
use Auth;
class ProjectController extends controller
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
        if (!Auth()->user()->can('project.list')) {
            abort(401);
        }
        $totals=Terms::where('type','project')->count();
        $actives=Terms::where('type','project')->where('status',1)->count();
        $incomplete=Terms::where('type','project')->where('status',2)->count();
        $trash=Terms::where('type','project')->where('status',0)->count();

        
        $src=$request->src ?? '';
        if ($type=="all") {
            if ($request->src) {
                $posts=Terms::where('type','project')->where($request->type,'LIKE','%'.$request->src.'%')->with('post_preview')->latest()->withCount('connection')->paginate(30);
            }
            else{
             $posts=Terms::where('type','project')->with('post_preview')->withCount('connection')->latest()->paginate(30);
            }
        }
        else{
             if ($request->src) {
                $posts=Terms::where('type','project')->where($request->type,'LIKE','%'.$request->src.'%')->with('post_preview')->where('status',$type)->latest()->withCount('connection')->paginate(30);

              }
              else{
                $posts=Terms::where('type','project')->with('post_preview')->where('status',$type)->withCount('connection')->latest()->paginate(30);
              }  
            
        }

        return view('plugin::project.index',compact('type','totals','actives','incomplete','trash','posts','src'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!Auth()->user()->can('project.create')) {
        abort(401);
       }
       return view('plugin::project.step_1');
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
            'name' => 'required|max:100',
            'type' => 'required',
        ]);

        $slug=Str::slug($request->name);
        $count=Terms::where('type','project')->where('slug',$slug)->count();
        if ($count > 0) {
            $slug=$slug.'-'.rand(40,60).$count;
        }

        $term=new Terms;
        $term->title=$request->name;
        $term->slug=$slug;
        $term->user_id =Auth::id();
        $term->status = 2;
        $term->type = 'project';
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

        $seo['meta_title']=$request->name;
        $seo['meta_tags']='';
        $seo['meta_description']='';

        $meta=new Meta;
        $meta->term_id=$term->id;
        $meta->type='seo';
        $meta->content=json_encode($seo);
        $meta->save();

        $contact_type['email']=Auth::user()->email;
        $contact_type['contact_type']='mail';

        $contact=new Meta;
        $contact->term_id=$term->id;
        $contact->type='contact_type';
        $contact->content=json_encode($contact_type);
        $contact->save();



        $cat=Postcategory::insert(['term_id'=>$term->id,'category_id'=>$request->type]);
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Project Created Successfully"
        ]);
        
         return redirect()->route('admin.project.edit',$term->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('project.edit')) {
            abort(401);
        }
        $this->term_id=$id;
        $info=Terms::with('excerpt','content','seo','postcategory','latitude','longitude','city','medias','facilities','options','finished_at','open_sell_date','contact_type')->find($id);
        $input_options=\App\Category::where('type','option')->with(['post_category_option'=>function($q){
            return $q->where('term_id',$this->term_id);
        }])->get();
        $seo=json_decode($info->seo->content);
        $contact_type=json_decode($info->contact_type->content ?? '');
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
           $input_options=\App\Category::where('type','option')->with(['post_category_option'=>function($q){
            return $q->where('term_id',$this->term_id);
            }])->get();
        }

        $facilities=Category::where('type','facilities')->get();
        return view('plugin::project.edit',compact('info','input_options','seo','array','facilities','contact_type'));
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
      // dd($request->all());
         $validatedData = $request->validate([
            'name' => 'required|max:100',
            //'state' => 'required',
            'city' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'max:500',
           
        ]);

         
        $term=Terms::find($id);
        $term->title=$request->name;
        $term->status=1;
        $term->featured=$request->featured;
        $term->save();

        $excerpt=Meta::where('term_id',$id)->where('type','excerpt')->first();
        if (empty($excerpt)) {
            $excerpt=new Meta;
            $excerpt->term_id=$id;
            $excerpt->type='excerpt';
        }
        $excerpt->content=$request->excerpt;
        $excerpt->save();

        $contents=Meta::where('term_id',$id)->where('type','content')->first();
        if (empty($contents)) {
            $contents=new Meta;
            $contents->term_id=$id;
            $contents->type='content';
        }
        $contents->content=$request->content;
        $contents->save();


        $contact_type=Meta::where('term_id',$id)->where('type','contact_type')->first();
        if (empty($contact_type)) {
            $contact_type=new Meta;
            $contact_type->term_id=$id;
            $contact_type->type='contact_type';
        }
        $contact['contact_type']='mail';
        $contact['email']=$request->email;

        $contact_type->content=json_encode($contact);
        $contact_type->save();
        

        $finished_at=Meta::where('term_id',$id)->where('type','finished_at')->first();
        if (empty($finished_at)) {
            $finished_at=new Meta;
            $finished_at->term_id=$id;
            $finished_at->type='finished_at';
        }
        $finished_at->content=$request->finished_at;
        $finished_at->save();

        $open_sell_date=Meta::where('term_id',$id)->where('type','open_sell_date')->first();
        if (empty($open_sell_date)) {
            $open_sell_date=new Meta;
            $open_sell_date->term_id=$id;
            $open_sell_date->type='open_sell_date';
        }
        $open_sell_date->content=$request->open_sell_date;
        $open_sell_date->save();

        $seodata['meta_title']=$request->meta_title;
        $seodata['meta_tags']=$request->meta_tags;
        $seodata['meta_description']=$request->meta_description;
        $seo=Meta::where('term_id',$id)->where('type','seo')->first();
        if (empty($seo)) {
            $seo=new Meta;
            $seo->term_id=$id;
            $seo->type='seo';
        }
        $seo->content=json_encode($seodata);
        $seo->save();

        $city=Postcategoryoption::where('term_id',$id)->where('category_id',$request->city)->where('type','city')->first();
        if (empty($city)) {
            $city= new Postcategoryoption;
            $city->category_id =$request->city;
            $city->term_id =$id;
            $city->type ='city';
        }

        $city->value=$request->location;
        $city->save();

        $latitude =Postcategoryoption::where('term_id',$id)->where('category_id',$request->city)->where('type','latitude')->first();
        if (empty($latitude)) {
            $latitude = new Postcategoryoption;
            $latitude->category_id =$request->city;
            $latitude->term_id =$id;
            $latitude->type ='latitude';
        }

        $latitude->value=$request->latitude;
        $latitude->save();

        $longitude =Postcategoryoption::where('term_id',$id)->where('category_id',$request->city)->where('type','longitude')->first();
        if (empty($longitude)) {
            $longitude = new Postcategoryoption;
            $longitude->category_id =$request->city;
            $longitude->term_id =$id;
            $longitude->type ='longitude';
        }

        $longitude->value=$request->longitude;
        $longitude->save();

        $options=[];
        foreach ($request->input_option ?? [] as $key => $value) {
            if (!empty($value)) {
                $data['term_id']=$id;
                $data['category_id']=$request->input_id[$key];
                $data['type']='options';
                $data['value']=$value;
                array_push($options, $data);
                
            } 
        }

        foreach ($request->facilities ?? [] as $key => $value) {
            if (!empty($request->facilities_input[$key])) {
                 $data['term_id']=$id;
                 $data['category_id']=$value;
                 $data['type']='facilities';
                 $data['value']=$request->facilities_input[$key];

                array_push($options, $data);
            }
        }

        Postcategoryoption::where('type','options')->orWhere('type','facilities')->where('term_id',$id)->delete();
        Postcategoryoption::insert($options);


        $category=[];
        foreach ($request->category ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id']=$id;
                $post_cat['category_id']=$value;
                $post_cat['type']='category';
                array_push($category, $post_cat);
            }
           
        }

        foreach ($request->features ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id']=$id;
                $post_cat['category_id']=$value;
                $post_cat['type']='features';
                array_push($category, $post_cat);
            }
           
        }

        foreach ($request->status as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id']=$id;
                $post_cat['category_id']=$value;
                $post_cat['type']='status';
                array_push($category, $post_cat);
            }
           
        }

        foreach ($request->investor ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id']=$id;
                $post_cat['category_id']=$value;
                $post_cat['type']='investor';
                array_push($category, $post_cat);
            }
           
        }
        foreach ($request->state as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id']=$id;
                $post_cat['category_id']=$value;
                $post_cat['type']='state';
                array_push($category, $post_cat);
            }
           
        }


        Postcategory::where('term_id',$id)->delete();
        Postcategory::insert($category);

        return response()->json(['Project Updated Successfully']);

    }

    /**
     * Remove and change status the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
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