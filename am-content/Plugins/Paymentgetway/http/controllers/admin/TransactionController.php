<?php 

namespace Amcoders\Plugin\Paymentgetway\http\controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Categorymeta;
use App\Options;
use App\Models\Transaction;
use Cache;
class TransactionController extends controller
{
    public function index(){
       $posts=Transaction::with('package','user')->latest()->paginate(40);
       return view('plugin::admin.transaction',compact('posts'));
    }

}	