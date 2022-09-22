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
        return view('view::agent.favourite',compact('properties'));
    }
}