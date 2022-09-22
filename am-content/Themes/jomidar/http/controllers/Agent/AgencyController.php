<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use Auth;
use Session;
use Str;
use App\Category;
use App\Categorymeta;
use App\Models\User;
use App\Models\Categoryuser;
class AgencyController extends controller
{
    public function index(Request $request)
    {
        $type =$request->type ?? 'agency';
        if($type=='agency'){
           $posts = Category::where([
            ['type','agency']
           ])->where('user_id',Auth::id())->withCount('agency_lists')->latest()->paginate(20);
        }

        if($type=='collaborations'){
             $posts = Category::where([
                ['type','agency']
             ])->whereHas('categoryuser',function($q){
                return $q->where('user_id',Auth::id());
             })->withCount('agency_lists')->with('categoryuser')->latest()->paginate(20);
        }

        $total_posts=Category::where([
            ['type','agency']
        ])->where('user_id',Auth::id())->count();
        $total_collaborations=Categoryuser::where('user_id',Auth::id())->count();

    	return view('view::agent.agency.index',compact('posts','total_collaborations','total_posts','type'));
    }

    public function create()
    {
    	$posts=Terms::where([
    		['type','agency_package'],
    		['status',1]
    	])->latest()->get();
        return view('view::agent.agency.create',compact('posts'));
    }

    public function show($id){
    	$info=Terms::where([
    		['type','agency_package'],
    		['status',1]
    	])->findorFail($id);
    	$check_credit=Auth::user()->credits;
    	if($info->count > $check_credit){
           Session::flash('error','credit limit exceeded please recharge your credit');
           return redirect()->route('agent.package.index');
        }
        return view('view::agent.agency.create_now',compact('info'));

    }


    public function store(Request $request){

    	$info=Terms::where([
    		['type','agency_package'],
    		['status',1]
    	])->findorFail($request->id);
    	$check_credit=Auth::user()->credits;
    	$new_credit=$check_credit-$info->count;
    	if($info->count > $check_credit){
    		Session::flash('error','credit limit exceeded please recharge your credit');
    		return redirect()->route('agent.package.index');
    	}


    	$validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        $slug_generate = Str::slug($request->name);
        $category_slug_get = Category::where('slug',$slug_generate)->first();
        if($category_slug_get)
        {
            $slug = $slug_generate.Str::random(5);
        }else{
            $slug = $slug_generate;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->type = 'agency';
        $category->user_id = Auth::User()->id;
        $category->status = $request->status;
        $category->featured = $info->count;
        $category->status = 1;
        $category->save();

       	$user=User::find(Auth::id());
        $user->credits=$new_credit;
        $user->save();


        $usermeta = new Categorymeta();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'preview';
        if($request->preview)
        {
            $usermeta->content = $request->preview;
        }else{
            $usermeta->content =null;
        }
        $usermeta->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license,
            'email' => $request->email
        ];

        $usermeta = new Categorymeta();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();

        $meta['user_id']=Auth::id();
        $meta['category_id']=$category->id;
        Categoryuser::insert($meta);
        return response()->json('Agency Created');

    }

    public function edit($id){
        $agency = Category::with('categorymeta','users')->where('user_id',Auth::id())->findOrfail($id);

        return view('view::agent.agency.edit',compact('agency'));
    }

    public function update(Request $request,$id){

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'file' => 'image|max:1000',

        ]);

        $category = Category::where('user_id',Auth::User()->id)->with('preview')->findorFail($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        if($request->file){
            $file=$request->file;
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = 'uploads/'.date('y/m/');
            $file->move($target_path, $name);

            $thumbnail=$target_path.$name;
        }
        else{
             $thumbnail=$category->preview->content ?? null;
        }

        $image = Categorymeta::where([
            ['category_id',$id],
            ['type','preview']
        ])->first();
        if(empty($image)){
            $image = new Categorymeta;
            $image->category_id=$id;
            $image->type='preview';
        }
        $image->content =$thumbnail;
        $image->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license,
            'email' => $request->email
        ];

        $usermeta = Categorymeta::where([
            ['category_id',$id],
            ['type','content']
        ])->first();

        $usermeta->category_id = $category->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Agency Updated');
    }


    public function invite_now(Request $request,$id){


        $user=User::where('email',$request->email)->first();
        if(empty($user)){
            $err='User Not Found';
         $error['errors']['err']=$err;
          return response()->json($error,404);
        }
        $category=Category::where('user_id',Auth::id())->withCount('agency_lists')->findorFail($id);

        if($category->featured <= $category->agency_lists_count){
         $err='Maximum user limit exceeded';
         $error['errors']['err']=$err;
         return response()->json($error,401);
        }

        Categoryuser::where('user_id',$user->id)->where('category_id',$id)->delete();

        $meta['user_id']=$user->id;
        $meta['category_id']=$id;
        Categoryuser::insert($meta);

        return response()->json(['Successfully Added !!']);
    }

    public function remove_agent($user_id,$category_id){
        $category=Category::where('user_id',Auth::id())->findorFail($category_id);
        Categoryuser::where('user_id',$user_id)->where('category_id',$category_id)->delete();
        return back();
    }

    public function destroy($id){

       $post= Category::where('user_id',Auth::User()->id)->findorFail($id);
       $post->delete();
       return back();
    }

    public function leave($id){
       Categoryuser::where('category_id',$id)->where('user_id',Auth::id())->delete();
       return back();
    }

}
