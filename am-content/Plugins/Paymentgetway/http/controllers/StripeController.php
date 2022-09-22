<?php 

namespace Amcoders\Plugin\Paymentgetway\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Omnipay\Omnipay;
use Session;
class StripeController extends controller
{
	public static function redirect_if_payment_success()
    {
       return route('agent.payment.success');
    }

    public static function redirect_if_payment_faild()
    {
        return route('agent.payment.fail');
    }

    public static function make_payment($array)
    {
        $stripe_credentials=Session::get('stripe_credentials');

        $gateway = Omnipay::create('Stripe');
        $gateway->setApiKey($stripe_credentials['secret_key']);


        $response = $gateway->purchase([
            'amount' => $array['amount'],
            'currency' => $stripe_credentials['currency'],
            "email"=>$array['email'],
            'token' => $array['stripeToken'],
        ])->send();

        if ($response->isSuccessful()) {
            $arr_payment_data = $response->getData();
            
            $data['payment_id'] = $arr_payment_data['id'];
            $data['payment_method'] = "stripe";
            $order_info= Session::get('order_info');
            $data['ref_id'] =$order_info['ref_id'];
            $data['amount'] =$order_info['amount'];
            $data['credit'] =$order_info['credit'];
            Session::forget('order_info');
            Session::forget('stripe_credentials');
            Session::put('payment_info', $data);

            return redirect(StripeController::redirect_if_payment_success());
        } else {
           
           return redirect(StripeController::redirect_if_payment_faild());
        }
        
    } 
}