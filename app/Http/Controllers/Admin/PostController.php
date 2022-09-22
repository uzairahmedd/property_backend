<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Terms;
use App\Meta;
use App\Post;
use App\PostCategory;
use App\Postrelation;
use Auth;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       if (!Auth()->user()->can('blog.list')) {
            abort(404);
         }
        
        if($request->src) {
           $posts=Terms::with('user')->where('type','blog')->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
        }
        elseif($request->st) {
            if ($request->st=='trash') {
                 $posts=Terms::with('user')->where('type','blog')->where('status',0)->latest()->paginate(20);
                 $status=$request->st;
                 return view('admin.posts.index',compact('posts','status'));
            }
            else{
               $posts=Terms::with('user')->where('type','blog')->where('status',$request->st)->latest()->paginate(20);
               $status=$request->st;
               return view('admin.posts.index',compact('posts','status')); 
           }
           
       }
        else{
          $posts=Terms::with('user')->where('type','blog')->latest()->where('status','!=',0)->paginate(20);
        }
        $status=1;
        return view('admin.posts.index',compact('posts','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('blog.create')) {
            abort(404);
         }
        return view('admin.posts.create');
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
            'title' => 'required|max:100',
            
        ]);


        $creat_slug=Str::slug($request->title);
        if ($creat_slug=='') {
            $creat_slug=str_replace(' ', '-', $request->title);
        }
        $check=Terms::where('slug',$creat_slug)->where('type',2)->count();
        if ($check != 0) {
            $slug=$creat_slug.'-'.$check;
        }
        else{
            $slug=$creat_slug;
        }


        


        $post=new Terms;
        $post->title=$request->title;
        $post->slug=$slug;
        $post->type='blog';
        $post->user_id=Auth::id();
        $post->status=$request->status ?? 2;
        $post->save();

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->type='excerpt';
        $post_meta->content=$request->excerpt;
        $post_meta->save();

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->type='preview';
        $post_meta->content=$request->preview;
        $post_meta->save();

        $post_meta = new Meta;
        $post_meta->term_id=$post->id;
        $post_meta->type='content';
        $post_meta->content=$request->content;
        $post_meta->save();
        
        return redirect()->route('admin.blog.all');

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
        if (!Auth()->user()->can('blog.edit')) {
            abort(404);
         }
       $info=Terms::with('excerpt','content','preview')->find($id);   
       return view('admin.posts.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
       

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|max:100',
            
        ]);
         $slug= Terms::where('slug',$request->slug)->where('id','!=',$id)->first();
        if (!empty($slug)) {
            return response()->json(['Slug Must Be unique'],401);
        }

      

        $post= Terms::find($id);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->status=$request->status ?? 2;
        $post->save();

        $meta =  Meta::where('term_id',$id)->where('type','excerpt')->first();
        $meta->content=$request->excerpt;
        $meta->save();

        $meta =  Meta::where('term_id',$id)->where('type','content')->first();
        $meta->content=$request->content;
        $meta->save();


        $pr =  Meta::where('term_id',$id)->where('type','preview')->first();
        $pr->content=$request->preview;
        $pr->save();
        

        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if ($request->status=='publish') {
            if ($request->ids) {

                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=1;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='trash') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=0;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   Terms::destroy($id);
                   
                }
            }
        }
        return response()->json('Success');

    }
}
