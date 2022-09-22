<?php 

namespace Amcoders\Plugin\Post\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Categorymeta;
use Illuminate\Support\Str;
use Auth;
use DB;
class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     if (!Auth()->user()->can('feature.list')) {
      abort(401);
     }

     $posts=Category::where('type','feature')->with('icon')->latest()->paginate(20);
     return view('plugin::features.index',compact('posts'));
    }

    public function facilities()
    {
      if (!Auth()->user()->can('facilities.list')) {
        abort(401);
      }
      $posts=Category::where('type','facilities')->with('icon')->latest()->paginate(20);
      return view('plugin::facilities.index',compact('posts'));
    }

    public function facilitiescreate()
    {
       if (!Auth()->user()->can('facilities.create')) {
          abort(401);
        }
      return view('plugin::facilities.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if (!Auth()->user()->can('feature.create')) {
      abort(401);
     }
      return view('plugin::features.create');
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
        'name' => 'required|unique:categories|max:100',           
      ]);

      $slug=Str::slug($request->name);

      $category=new Category;
      $category->name=$request->name;
      $category->slug=$slug;
      $category->featured=$request->featured;
      $category->type=$request->type;
      $category->user_id=Auth::id();
      $category->save();

      $meta=new Categorymeta;
      $meta->category_id=$category->id;
      $meta->type='icon';
      $meta->content=$request->icon ?? '';
      $meta->save();
      return response()->json($request->type.' created');

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
      $info=Category::with('icon')->find($id);
      if ($info->type=='facilities') {
        if (!Auth()->user()->can('facilities.edit')) {
          abort(401);
        }
       return view('plugin::facilities.edit',compact('info'));
      }
      if (!Auth()->user()->can('feature.edit')) {
        abort(401);
      }
      return view('plugin::features.edit',compact('info'));

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
      ]);

      $category=Category::find($id);
      $category->name=$request->name;
       $category->featured=$request->featured;
      $category->save();

      $meta= Categorymeta::where('type','icon')->where('category_id',$id)->first();
      $meta->content=$request->icon ?? '';
      $meta->save();


      return response()->json($category->type.' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
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