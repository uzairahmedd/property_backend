<?php 

namespace Amcoders\Plugin\Post\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Categorymeta;
use Illuminate\Support\Str;
use Auth;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (!Auth()->user()->can('category.list')) {
        abort(401);
      }
     $posts=Category::where('type','category')->with('creditcharge')->latest()->paginate(20);
     return view('plugin::category.index',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if (!Auth()->user()->can('category.create')) {
        abort(401);
      }
      return view('plugin::category.create');
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
      if ($request->p_id) {
        $category->p_id=$request->p_id;
      }
     
      
      $category->type=$request->type;
      $category->featured=$request->featured;
      $category->user_id=Auth::id();
      $category->save();

      $meta=new Categorymeta;
      $meta->category_id = $category->id;
      $meta->type = "credit_charge";
      $meta->content =$request->charge;
      $meta->save();

      $meta=new Categorymeta;
      $meta->category_id = $category->id;
      $meta->type = "excerpt";
      $meta->content =$request->excerpt;
      $meta->save();
      return response()->json('Category created');

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
      if (!Auth()->user()->can('category.edit')) {
        abort(401);
      }
      $info=Category::with('creditcharge','excerpt')->find($id);
      
      return view('plugin::category.edit',compact('info'));

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
      $category->slug=$request->slug;
      if ($request->p_id) {
        $category->p_id=$request->p_id;
      }
      $category->featured=$request->featured;
      $category->save();

      $meta=Categorymeta::where('type','credit_charge')->where('category_id',$id)->first();
      $meta->content =$request->charge;
      $meta->save();


   
      $meta=Categorymeta::where('type','excerpt')->where('category_id',$id)->first();
      $meta->content =$request->excerpt;
      $meta->save();

      return response()->json('Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
      if(!Auth()->user()->can('category.delete')) {
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