<?php 

namespace Amcoders\Plugin\Post\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Review;
class ReviewController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth()->user()->can('review.list')) {
           abort(401);
        }

        if(!empty($request->src)){
            $posts=Review::where($request->type,$request->src)->with('user','term')->paginate(50);
        }
        else{
           $posts=Review::orderBy('is_reported','DESC')->with('user','term')->paginate(50); 
        }
       
        return view('plugin::review.index',compact('posts','request'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('review.delete')) {
           abort(401);
        }
        if($request->status == 'delete'){
           Review::destroy($request->ids); 
        }

        return response()->json(['Review Deleted....!!']);
    }
}