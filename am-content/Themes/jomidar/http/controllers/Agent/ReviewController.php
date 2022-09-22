<?php 

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Usermeta;
use App\Models\Review;


class ReviewController extends controller
{
    public function index()
    {
        $posts = Review::with('term')->where('user_id',Auth::User()->id)->paginate(20);
        return view('view::agent.reviews',compact('posts'));
    }

    public function show($id)
    {
    	$post = Review::where('user_id',Auth::User()->id)->findorFail($id);
    	$post->is_reported = 1;
    	$post->save();
    	
    	return back();
    }


}