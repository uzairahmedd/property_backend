<?php 

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Category;
class PackageController extends controller
{
    public function index()
    {
    	$posts=Terms::where('type','package')->where('status',1)->latest()->get();
        return view('view::agent.package',compact('posts'));
    }

    public function purchase_page($id)
    {
    	$info=Terms::where('type','package')->where('status',1)->findorFail($id);
        $amount= format_currency($info->count);
        $posts=Category::where('type','getway')->with('credintial')->get();
    	return view('view::agent.payment_page',compact('amount','info','posts'));
    }

    public function payment()
    {

        return view('view::agent.payment');
    }
}