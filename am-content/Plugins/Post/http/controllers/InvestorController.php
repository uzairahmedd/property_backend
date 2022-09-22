<?php 

namespace Amcoders\Plugin\Post\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Auth;
class InvestorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(!Auth()->user()->can('investor.list')) {
        abort(401);
      }
     $posts=Category::where('type','investor')->latest()->paginate(20);
     return view('plugin::investor.index',compact('posts'));
   }

   
   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if(!Auth()->user()->can('investor.create')) {
        abort(401);
      }
      return view('plugin::investor.create');
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
      $category->slug=$request->name;
      $category->type=$request->type;
      $category->featured=0;
      $category->user_id=Auth::id();
      $category->save();

      return response()->json('Investor created');



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
      if(!Auth()->user()->can('investor.edit')) {
        abort(401);
      }
      $info=Category::find($id);
      return view('plugin::investor.edit',compact('info'));
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
      $category->featured=0;
      $category->save();
      return response()->json('Investor Updated');


    }


  }