<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use Auth;
class DashboardController extends controller
{
    public function index()
    {
    	$approved_properties =Terms::where('user_id', '=', Auth::id())->where('status', '=',1)->where('is_land_block', 0)->count();
    	$pending_properties =Terms::where('user_id', '=', Auth::id())->where('status', '=',3)->where('is_land_block', 0)->count();
    	$rejected_properties =Terms::where('user_id', '=', Auth::id())->where('status', '=',4)->where('is_land_block', 0)->count();
    	$posts=Terms::where('type','property')->where('is_land_block', 0)->with('property_type','property_status_type','post_city')->where('user_id',Auth::id())->latest()->paginate(20);
        return view('view::agent.dashboard',compact('approved_properties','pending_properties','rejected_properties','posts'));
    }

    public function logout()
    {
        auth()->logout();
        Session()->flush();

        return redirect()->route('new.home');
    }
}
