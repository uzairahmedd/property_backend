<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Terms;
use App\Models\Categoryrelation;
use Str;
class StatusController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('status.list')) {
            abort(401);
        } 
        $posts=Category::where('type','status')->latest()->paginate(20);  
        return view('plugin::status.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('status.create')) {
            abort(401);
        }
        return view('plugin::status.create');
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
            'title' => 'required|max:50',
        ]);

        $post= new Category;
        $post->name=$request->title;
        $post->slug=Str::slug($request->title);
        $post->type='status';
        $post->user_id=Auth::id();
        $post->status=1;
        $post->featured=$request->featured;
        $post->save();

        return response()->json(['Status Created']);
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
        if (!Auth()->user()->can('status.edit')) {
            abort(401);
        }
        $info=  Category::where('type','status')->findorFail($id);
       
        return view('plugin::status.edit',compact('info'));
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
            'title' => 'required|max:50',
        ]);

        $post=  Category::where('type','status')->findorFail($id);
        $post->name=$request->title;
        $post->type='status';
        $post->user_id=Auth::id();
        $post->featured=$request->featured;
        $post->save();

        return response()->json(['Status Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('status.delete')) {
            abort(401);
        }

        if ($request->method=='delete') {
           if ($request->ids) {
            foreach ($request->ids as $id) {
              Category::destroy($id);
            }
           }
        }


       return response()->json('Status Removed');
    }
}