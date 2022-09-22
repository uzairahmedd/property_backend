<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Categorymeta;
use Str;
use Auth;
class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (Auth()->user()->can('product_category.list')) {
            
        
      if ($request->src) {
        $posts=Category::where('type','product_category')->where($request->type,$request->src)->with('preview')->withCount('posts')->latest()->paginate(40); 
      }
      else{
         $posts=Category::where('type','product_category')->with('preview')->withCount('posts')->latest()->paginate(20);
      }  
         $src=$request->src ?? '';   
     return view('admin.product.category.index',compact('posts','src'));
     }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth()->user()->can('product_category.create')) {
        return view('admin.product.category.create');
       }
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

       ]);

       $category=new Category;
       $category->name=$request->name;
       $category->p_id=$request->p_id;
       $category->featured=$request->featured;
       $category->user_id=Auth::id();
       $category->slug=Str::slug($request->name);
       $category->type='product_category';
       $category->save();

       $meta=new Categorymeta;
       $meta->category_id =$category->id;
       $meta->type='preview';
       $meta->content=$request->preview;
       $meta->save();
       return response()->json(['Category Created']);
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
        if (Auth()->user()->can('product_category.edit')) {
        $info=Category::with('preview')->find($id);
        return view('admin.product.category.edit',compact('info'));
       }
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
        $category= Category::find($id);
        $category->name=$request->name;
        $category->p_id=$request->p_id;
        $category->slug=$request->slug;
        $category->featured=$request->featured;
        $category->save();

        $meta= Categorymeta::where('category_id',$id)->where('type','preview')->first();
        $meta->content=$request->preview;
        $meta->save();

        return response()->json(['Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
