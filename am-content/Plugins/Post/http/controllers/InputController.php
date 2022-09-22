<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Categorymeta;
use App\Models\Categoryrelation;

class InputController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth()->user()->can('input.list')) {
            abort(401);
        }
        if ($request->src) {
            $posts=Category::where('type','option')->where($request->type,'LIKE','%'.$request->src.'%')->latest()->paginate(20);  
        }
        else{
            $posts=Category::where('type','option')->latest()->paginate(20);  
        }
        $src=$request->src;
        return view('plugin::input.index',compact('posts','src'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('input.create')) {
            abort(401);
        }

         return view('plugin::input.create');
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
        $post->slug=$request->input_type;
        $post->type='option';
        $post->user_id=Auth::id();
        $post->status=$request->required;
        $post->featured=$request->featured;
        $post->save();

        if ($request->child) {
            $childs=[];
            foreach ($request->child as $key => $row) {
                $data['parent_id']=$post->id;
                $data['child_id']=$row;

                array_push($childs, $data);
            }

            Categoryrelation::insert($childs);
        }
        if(!empty($request->preview)){
            $meta=new Categorymeta;
            $meta->category_id=$post->id;
            $meta->type="preview";
            $meta->content=$request->preview;
            $meta->save();
        } 
        return response()->json(['Input Feild Created']);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (!Auth()->user()->can('input.edit')) {
            abort(401);
        }

         $info=Category::where('type','option')->with('child','preview')->findorFail($id);
         $categories=Category::where('type','category')->get();
         $childs=[];
         foreach ($info->child as $key => $value) {
            array_push($childs, $value->id);
         }


         return view('plugin::input.edit',compact('info','categories','childs'));
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

        $post=  Category::where('type','option')->findorFail($id);
        $post->name=$request->title;
        $post->slug=$request->input_type;
        $post->status=$request->required;
        $post->featured=$request->featured;
        $post->save();

        if ($request->child) {
            $childs=[];
            foreach ($request->child as $key => $row) {
                $data['parent_id']=$post->id;
                $data['child_id']=$row;

                array_push($childs, $data);
            }
            Categoryrelation::where('parent_id',$id)->delete();
            Categoryrelation::insert($childs);
        }

        if(!empty($request->preview)){
            $meta=Categorymeta::where('category_id',$id)->where('type','preview')->first();
            if(empty($meta)){
                $meta=new Categorymeta;
                $meta->category_id=$id;
                $meta->type="preview";
            }
            $meta->content=$request->preview;
            $meta->save();
        }

        return response()->json(['Input Feild Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('input.delete')) {
            abort(401);
        }
        if ($request->method=='delete') {
           if ($request->ids) {
            foreach ($request->ids as $id) {
              Category::destroy($id);
            }
           }
        }


       return response()->json('Input Removed');
    }
}