<?php 

namespace Amcoders\Plugin\currency\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Category;
use App\Categorymeta;
use Auth;
use Cache;
class CurrencyController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if (!Auth()->user()->can('currency.list')) {
            abort(401);
        }
        $currencies=Category::where('type','currency')->latest()->paginate(20);
        return view('plugin::currency.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('currency.create')) {
            abort(401);
        }
        return view('plugin::currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'symbol' => 'required',
            'price' => 'required'
        ]);


        if ($request->is_default==1) {
            $posts=Category::where('type','currency')->where('status',1)->get();
            foreach ($posts as $key => $value) {
                $post=Category::find($value->id);
                $post->status=0;
                $post->save();
            }
        }
        $currency = new Category();
        $currency->name = $request->title;
        $currency->slug = $request->symbol;
        $currency->user_id = Auth::User()->id;
        $currency->type = 'currency';
        $currency->featured = $request->price;
        $currency->status = $request->is_default;
        $currency->save();

        $meta=new Categorymeta;
        $meta->category_id=$currency->id;
        $meta->type='position';
        $meta->content=$request->position;
        $meta->save();
        Cache::forget('currency');
        return response()->json(['Currency Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('currency.edit')) {
            abort(401);
        }
        $info = Category::with('position')->find($id);
        return view('plugin::currency.edit',compact('info'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'symbol' => 'required',
            'price' => 'required'
        ]);

        $currency = Category::findorFail($id);
        $currency->name = $request->title;
        $currency->slug = $request->symbol;
        $currency->type = 'currency';
        $currency->featured = $request->price;
        $currency->status = $request->is_default;
        $currency->save();

        $meta= Categorymeta::where('category_id',$id)->first();
        $meta->category_id=$currency->id;
        $meta->type='position';
        $meta->content=$request->position;
        $meta->save();

        if ($request->is_default==1) {
            $posts=Category::where('type','currency')->where('id','!=',$id)->where('status',1)->get();
            foreach ($posts as $key => $value) {
                $post=Category::find($value->id);
                $post->status=0;
                $post->save();
            }
        }
        Cache::forget('currency');
        return response()->json(['Currency Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->status=='publish') {
            if ($request->ids) {

                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=1;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='trash') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                    $post=Terms::find($id);
                    $post->status=0;
                    $post->save();   
                }
                    
            }
        }
        elseif ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   Terms::destroy($id);
                   
                }
            }
        }
        Cache::forget('currency');
        return response()->json('Success');
    }
}