<?php 

namespace Amcoders\Plugin\Paymentgetway\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Http;
class MollieController extends controller
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
        $mollie_credentials=Session::get('mollie_credentials');
               

        $phone=$array['phone'];
        $email=$array['email'];
        $amount=$array['amount'];
        $ref_id=$array['ref_id'];
        $name=$array['name'];
        $billName=$array['billName'];


         try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($mollie_credentials['api_key']);

            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => $mollie_credentials['currency'],
                    "value" => $amount
                ],
                "description" => $billName,
                "redirectUrl" => route('mollie.fallback'),

            ]);
            Session::put('pay_id',$payment->id);
            return redirect($payment->getCheckoutUrl()) ;
        }
        catch (\Exception $e) {
           
            return redirect(MollieController::redirect_if_payment_faild());  
        }
    }


    public function status(Request $request)
    {
       

           $info=Session::get('mollie_credentials');


           $mollie = new \Mollie\Api\MollieApiClient();
           $mollie->setApiKey($info['api_key']);
           $pay_id= Session::get('pay_id');
           $payment = $mollie->payments->get($pay_id);

           if ($payment->isPaid())
           {

             $data['payment_id'] = $pay_id;
             $data['payment_method'] = "mollie";
             $order_info= Session::get('order_info');
             $data['ref_id'] =$order_info['ref_id'];
             $data['amount'] =$order_info['amount'];
             $data['credit'] =$order_info['credit'];
             Session::forget('order_info');
             Session::forget('pay_id');
             Session::put('payment_info', $data);
             return redirect(MollieController::redirect_if_payment_success());
           }
           return redirect(MollieController::redirect_if_payment_faild());     
    }
}