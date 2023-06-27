<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
/**
 *
 */
class FavouriteController extends controller
{
    public function index()
    {
        $properties = Auth::User()->favourite_properties()->paginate(20);
        // return view('theme::newlayouts.user_dashboard.favorite');
        return view('view::agent.favourite',compact('properties'));
    }

    public function user_favorites()
    {
        return view('theme::newlayouts.user_dashboard.favorite');
    }

    public function get_favorite_properties()
    {
        $properties = Auth::User()->user_favourite_properties()->paginate(15);
        return $properties;
    }
}
