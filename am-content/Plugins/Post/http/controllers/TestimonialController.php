<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Categorymeta;
use Illuminate\Support\Str;
use Auth;

class TestimonialController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('testimonial.list')) {
            abort(401);
        }
        $posts=Category::where('type','testimonial')->latest()->get();
        return view('plugin::testimonial.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('testimonial.create')) {
            abort(401);
        }
        return view('plugin::testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'ratting' => 'required',
            'comment' => 'required|max:500',
        ]);

        $category=new Category;
        $category->name=$request->name;
        $category->slug=$request->preview;
        $category->type='testimonial';
        $category->featured=$request->ratting;
        $category->user_id=Auth::id();
        $category->save();

        $meta=new Categorymeta;
        $meta->category_id =$category->id;
        $meta->type ='excerpt';
        $meta->content =$request->comment;
        $meta->save();

        return response()->json(['Testimonial Created....!!']);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('testimonial.edit')) {
            abort(401);
        }
        $info=Category::where('type','testimonial')->with('excerpt')->findorFail($id);
        $star=(int)$info->featured;
        
        return view('plugin::testimonial.edit',compact('info','star'));

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
        $validated = $request->validate([
            'name' => 'required|max:100',
            'ratting' => 'required',
            'comment' => 'required|max:500',
        ]);

        $category=Category::where('type','testimonial')->findorFail($id);
        $category->name=$request->name;
        $category->slug=$request->preview;
        $category->featured=$request->ratting;
        $category->save();

        $meta=Categorymeta::where('category_id',$id)->first();
        $meta->content =$request->comment;
        $meta->save();

        return response()->json(['Testimonial Updated....!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('testimonial.delete')) {
            abort(401);
        }
        if ($request->method=='delete') {
        if ($request->ids) {
           foreach ($request->ids as $id) {
            Category::destroy($id);
           }
         }
        }


    return response()->json('Post Removed');
    }
}