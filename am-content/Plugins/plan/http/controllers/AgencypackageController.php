<?php 

namespace Amcoders\Plugin\plan\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Meta;
use Auth;
use Illuminate\Support\Str;
class AgencypackageController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!Auth()->user()->can('agency_package.list')) {
            abort(401);
        }


        if($request->src) {
            $packages=Terms::where('type','agency_package')->where('title','LIKE','%'.$request->src.'%')->latest()->paginate(20);
         }
         elseif($request->st) {
             if ($request->Terms=='trash') {
                  $packages=Terms::where('type','agency_package')->where('status',0)->latest()->paginate(20);
                  $status=$request->st;
                  return view('plugin::plan.index',compact('packages','request','status'));
             }
             else{
                $packages=Terms::where('type','agency_package')->where('status',$request->st)->latest()->paginate(20);
                $status=$request->st;
                return view('plugin::plan.index',compact('packages','request','status')); 
            }
            
        }
         else{
         $packages=Terms::where('type','agency_package')->latest()->where('status','!=',0)->paginate(20);
         }
        return view('plugin::agency_plan.index',compact('packages','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('agency_package.create')) {
            abort(401);
        }
        
        return view('plugin::agency_plan.create');
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
            'credits' => 'required',
            'total_user' => 'required'
        ]);

        $creat_slug=Str::slug($request->title);
        $check = Terms::where('type','agency_package')->where('slug',$creat_slug)->count();
        if ($check != 0) {
            $slug= $creat_slug.'-'.$check;
        }
        else{
            $slug=$creat_slug;
        }

        $package = new Terms();
        $package->title = $request->title;
        $package->slug = $slug;
        $package->user_id = Auth::User()->id;
        $package->status = $request->status;
        $package->type = 'agency_package';
        $package->count = $request->credits;
        $package->featured = $request->total_user;
        $package->save();

       

        return response()->json('Package Created');
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
        if (!Auth()->user()->can('agency_package.edit')) {
            abort(401);
        }
        $info = Terms::find($id);
        return view('plugin::agency_plan.edit',compact('info'));
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
            'credits' => 'required',
            'total_user' => 'required'
        ]);
        
                
        $package =  Terms::find($id);
        $package->title = $request->title;
        $package->user_id = Auth::User()->id;
        $package->status = $request->status;
        $package->count = $request->credits;
        $package->featured = $request->total_user;
        $package->save();

       

        return response()->json('Package Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('agency_package.delete')) {
            abort(401);
        }
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
        return response()->json('Success');
    }
}