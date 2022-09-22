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
class PaymentController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('api_and_getway')) {
           abort(401);
       }
        $posts=Category::where('type','getway')->with('credintial')->get();
        return view('plugin::admin.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (!Auth()->user()->can('order.create')) {
        //     return abort(401);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['currency_name']=$request->currency_name;
        $data['currency_icon']=$request->currency_icon;
        $data['currency_position']=$request->currency_position;

        $option=Options::where('key','payment_settings')->first();
        if(empty($option)){
            $option=new Options();
            $option->key='payment_settings';
            
        }
        $option->value=json_encode($data);
        $option->save();
        Cache::forget('currency_settings');
        return response()->json(['Info Updated Successfully !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        // if (!Auth()->user()->can('order.show')) {
        //     return abort(401);
        // }
        if($id=='transaction'){
            if (!Auth()->user()->can('transactions')) {
             abort(401);
            }
            if(!empty($request->src)){
                $posts=Transaction::latest()->where($request->type,'LIKE','%'.$request->src.'%')->paginate(50);
            }
            else{
                $posts=Transaction::latest()->paginate(50);
            }
            
            return view('plugin::admin.transaction',compact('posts','request'));
        }
        if (!Auth()->user()->can('payment.settings')) {
           abort(401);
       }
        $info=Options::where('key','payment_settings')->first();
        $info=json_decode($info->value ?? '');
        return view('plugin::admin.payment',compact('info'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!Auth()->user()->can('api_and_getway')) {
           abort(401);
       }

        $info=Category::where('type','getway')->with('credintial')->findorFail($id);
        $credintials=json_decode($info->credintial->content ?? '');
        return view('plugin::admin.edit',compact('info','credintials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info=Category::where('type','getway')->findorFail($id);
        $info->status=$request->status ?? 0;
        $info->slug=$request->preview ?? null;
        $info->save();

        $credin=Categorymeta::where('category_id',$id)->where('type','credentials')->first();
        if(empty($credin)){
            $credin = new Categorymeta;
            $credin->category_id=$id;
            $credin->type='credentials';
        }

        if($info->name == 'Paypal'){
            $data['client_id']=$request->client_id;
            $data['client_secret']=$request->client_secret;
        }
        if($info->name == 'stripe'){
            $data['publishable_key']=$request->publishable_key;
            $data['secret_key']=$request->secret_key;
        }

        if($info->name == 'toyyibpay'){
            $data['categoryCode']=$request->categoryCode;
            $data['userSecretKey']=$request->userSecretKey;
        }

        if($info->name == 'Razorpay'){
            $data['key_id']=$request->key_id;
            $data['key_secret']=$request->key_secret;
        }

        if($info->name == 'Instamojo'){
            $data['x_api_Key']=$request->x_api_Key;
            $data['x_api_token']=$request->x_api_token;
        }

        if($info->name == 'Mollie'){
            $data['api_key']=$request->api_key;
          
        }
        

        $credin->content=json_encode($data);
        $credin->save();

        return response()->json(['Credentials Successfully Updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // if (!Auth()->user()->can('order.delete')) {
        //     return abort(401);
        // }
    }
}