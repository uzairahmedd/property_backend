<?php 

namespace Amcoders\Plugin\Paymentgetway\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Omnipay\Omnipay;
use Session;
class PaypalController extends controller
{
	    
    public static function redirect_if_payment_success()
    {
       return route('agent.payment.success');
    }

    public static function redirect_if_payment_faild()
    {
        return route('agent.payment.fail');
    }

    public static function make_payment($amount,$currency)
    {

        $paypal_credentials=Session::get('paypal_credentials');        
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId($paypal_credentials['client_id']);
        $gateway->setSecret($paypal_credentials['client_secret']);
        $gateway->setTestMode(env('APP_DEBUG')); 

        if (env('APP_DEBUG') == true) {
        	$total_amount= $amount/100;
        }
        else{
        	$total_amount=$amount;
        }

        $response = $gateway->purchase(array(
            'amount' =>$total_amount,
            'currency' => strtoupper($paypal_credentials['currency']),
            'returnUrl' => route('paypal_fallback'),
            'cancelUrl' => PaypalController::redirect_if_payment_faild(),
        ))->send();
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    }

    public function paypal_success_payment(Request $request)
    {
        $paypal_credentials=Session::get('paypal_credentials');

        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId($paypal_credentials['client_id']);
        $gateway->setSecret($paypal_credentials['client_secret']);
        $gateway->setTestMode(env('APP_DEBUG')); 

        $request= $request->all();

        $transaction = $gateway->completePurchase(array(
            'payer_id'             => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));
        $response = $transaction->send();
        if ($response->isSuccessful()) {
            $arr_body = $response->getData();
            $data['payment_id'] = $arr_body['id'];
            $data['payment_method'] = "paypal";

            $order_info= Session::get('order_info');
            $data['ref_id'] =$order_info['ref_id'];
            $data['amount'] =$order_info['amount'];
            $data['credit'] =$order_info['credit'];
            Session::forget('order_info');
            Session::put('payment_info', $data);
            return redirect(PaypalController::redirect_if_payment_success());
        }
        else{
           return redirect(PaypalController::redirect_if_payment_faild());
        }
    }


}