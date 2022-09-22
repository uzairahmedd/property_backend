<?php 

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Usermeta;
use App\Models\Transaction;
use Illuminate\Support\Str;
/**
 * 
 */
class TransactionController extends controller
{
    public function transaction()
    {
        $transactions = Transaction::with('package')->where('user_id',Auth::User()->id)->paginate(20);
        return view('view::agent.transaction',compact('transactions'));
    }
}