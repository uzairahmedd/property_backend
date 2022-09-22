<?php 

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Omnipay\Omnipay;
use Session;
use Auth;
use App\Models\Transaction;
use App\Models\User;
use App\Category;
use App\Options;
use Amcoders\Plugin\Paymentgetway\http\controllers\PaypalController;
use Amcoders\Plugin\Paymentgetway\http\controllers\StripeController;
use Amcoders\Plugin\Paymentgetway\http\controllers\ToyyibpayController;
use Amcoders\Plugin\Paymentgetway\http\controllers\InstamojoController;
use Amcoders\Plugin\Paymentgetway\http\controllers\MollieController;
use Amcoders\Plugin\Paymentgetway\http\controllers\RazorpayController;
class PaymentController extends controller
{

    public function index(Request $request,$id)
    {

        $info=\App\Terms::where('type','package')->where('status',1)->findorFail($id);
        $getway_info=Category::where('type','getway')->where('status',1)->with('credintial')->findorFail($request->payment_type);
        $currency=Options::where('key','payment_settings')->first();
        Session::put('total_amount',$info->count);
        $validatedData = $request->validate([
            'payment_type' => 'required',
        ]);

        $getway=json_decode($getway_info->credintial->content);
        $currency=json_decode($currency->value);
       
        if ($getway_info->name == "Paypal") {
            
            $paypal_credentials['client_id']=$getway->client_id;
            $paypal_credentials['client_secret']=$getway->client_secret;
            $paypal_credentials['currency']=strtoupper($currency->currency_name);
            Session::put('paypal_credentials',$paypal_credentials);


           
            $currency=$currency;
            $total=$info->count;
            $data['credit']=$info->featured;
            $data['ref_id']=$info->id;
            $data['amount']=$total;
            
            Session::put('order_info',$data);
            PaypalController::make_payment($total,$currency);
        }

        if ($getway_info->name == "stripe") {
            $stripe_credentials['publishable_key']=$getway->publishable_key;
            $stripe_credentials['secret_key']=$getway->secret_key;
            $stripe_credentials['currency']=strtoupper($currency->currency_name);
            Session::put('stripe_credentials',$stripe_credentials);


            $currency=$currency;
            $total=$info->count;
            $data['credit']=$info->featured;
            $data['ref_id']=$info->id;
            $data['amount']=$total;
            Session::put('order_info',$data);
            
            $data['stripeToken']=$request->input('stripeToken');
            $data['amount']=$total;
            $data['currency']=$currency;
            $data['email']=Auth::user()->email;
          return  StripeController::make_payment($data);
        }


        if ($getway_info->name == "toyyibpay") {
            $validatedData = $request->validate([
                'phone_number' => 'required',
            ]);

            $toyyibpay_credentials['categoryCode']=$getway->categoryCode;
            $toyyibpay_credentials['userSecretKey']=$getway->userSecretKey;           
            Session::put('toyyibpay_credentials',$toyyibpay_credentials);

            $currency=$currency;
            $total=$info->count;

            $data['ref_id']=$info->id;
            $data['amount']=$total;
            $data['credit']=$info->featured;
            Session::put('order_info',$data);
            $data['amount']=$total;
            $data['email']=Auth::user()->email;
            $data['name']=Auth::user()->name;
            $data['phone']=$request->phone_number;
            $data['billName']=$info->title;
            $data['currency']=$currency;
            $get_url=ToyyibpayController::make_payment($data);
            return redirect($get_url);
        }

        if ($getway_info->name == "Instamojo") {
            $validatedData = $request->validate([
                'phone_number' => 'required',
            ]);

            $instamojo_credentials['x_api_Key']=$getway->x_api_Key;
            $instamojo_credentials['x_api_token']=$getway->x_api_token;
            $instamojo_credentials['currency']=strtoupper($currency->currency_name);
            Session::put('instamojo_credentials',$instamojo_credentials);

            $currency=$currency;
            $total=$info->count;
            $data['credit']=$info->featured;
            $data['ref_id']=$info->id;
            $data['amount']=$total;
            Session::put('order_info',$data);
            $data['amount']=$total;
            $data['email']=Auth::user()->email;
            $data['name']=Auth::user()->name;
            $data['phone']=$request->phone_number;
            $data['billName']=$info->title;
            $data['currency']=$currency;
            $get_url=InstamojoController::make_payment($data);
            return redirect($get_url);
        }

        if ($getway_info->name == "Mollie") {
           
            $mollie_credentials['api_key']=$getway->api_key;
            $mollie_credentials['currency']=strtoupper($currency->currency_name);
            Session::put('mollie_credentials',$mollie_credentials);

            $currency=$currency;
            $total=str_replace(',','',number_format($info->count,2));
            $data['credit']=$info->featured;
            $data['ref_id']=$info->id;
            $data['amount']=$total;
            Session::put('order_info',$data);
            $data['amount']=str_replace(',','',$total);
            $data['email']=Auth::user()->email;
            $data['name']=Auth::user()->name;
            $data['phone']=$request->phone_number;
            $data['billName']=$info->title;
            $data['currency']=$currency;
            return MollieController::make_payment($data);
           
        }

        if ($getway_info->name == "Razorpay") {
            $validatedData = $request->validate([
                'phone_number' => 'required',
            ]);
            $razorpay_credentials['key_id']=$getway->key_id;
            $razorpay_credentials['key_secret']=$getway->key_secret;
            $razorpay_credentials['currency']=strtoupper($currency->currency_name);
            Session::put('razorpay_credentials',$razorpay_credentials);

            $currency=$currency;
            $total=$info->count;

            $data['credit']=$info->featured;
            $data['ref_id']=$info->id;
            $data['amount']=$total;
            Session::put('order_info',$data);
            $data['amount']=$total;
            $data['email']=Auth::user()->email;
            $data['name']=Auth::user()->name;
            $data['phone']=$request->phone_number;
            $data['currency']=$currency;
            $data['billName']=$info->title;

           $response=RazorpayController::make_payment($data);
            
          return view('view::agent.payment.razorpay',compact('response'));
        }


    }


    public function payment_success()
    {
        if (\Session::has('payment_info')) {
            $payment_info=\Session::get('payment_info');
            \Session::forget('payment_info');
            $transaction=new Transaction;
            $transaction->user_id=Auth::id();
            $transaction->term_id=$payment_info['ref_id'];
            $transaction->payment_method=$payment_info['payment_method'];
            $transaction->payment_id=$payment_info['payment_id'];
            $transaction->credits=$payment_info['credit'];
            $transaction->amount=Session::get('total_amount');
            $transaction->save();
            
            $my_credits=Auth::user()->credits;
            $total=$my_credits+$payment_info['credit'];

            $user=User::find(Auth::id());
            $user->credits=$total;
            $user->save();
            Session::forget('total_amount');
            \Session::flash("success","Successfully Recharged");
            return redirect()->route('agent.package.index');
        }
        abort(401);
    }

    public function payment_fail()
    {
       if (\Session::has('payment_info')) {
            \Session::forget('payment_info');
        }
        if (\Session::has('order_info')) {
            \Session::forget('order_info');
        }
         Session::forget('total_amount');
        \Session::flash("error","Transaction Faild");
        return redirect()->route('agent.package.index');
    }


  

}