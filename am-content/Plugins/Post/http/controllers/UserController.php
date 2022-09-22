<?php 


namespace Amcoders\Plugin\Post\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Category;
use App\Terms;
use App\Usermeta;
use Hash;
use Illuminate\Support\Str;
use App\Categorymeta;
use App\Models\Categoryuser;
use Auth;

class UserController extends Controller{

    public function agent(Request $request)
    {
        if (!Auth()->user()->can('user.list')) {
            abort(401);
        }
        if(!empty($request->src)){
            $agents = User::where([
                ['role_id',2],
                [$request->type,$request->src]
            ])->with('user_session')->latest()->paginate(20);
        }
        else{
         $agents = User::where([
            ['role_id',2]
         ])->with('user_session')->latest()->paginate(20); 
        }
        

        return view('plugin::agent.index',compact('agents','request'));
    }

    public function agent_edit($id)
    {
        if (!Auth()->user()->can('user.edit')) {
            abort(401);
        }
        $agent = User::with('usermeta','credit')->findOrFail($id);
        return view('plugin::agent.edit',compact('agent'));
    }

    public function login($id){
        $user = User::where('role_id',2)->findorFail($id);
        Auth::logout();
        Auth::loginUsingId($id);

        return redirect('/agent/dashboard');
    }

    public function agent_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $slug_name = Str::slug($request->name);

        $slug_generate = User::where('slug',$slug_name)->first();

        if($slug_generate)
        {
            $slug = $slug_name.Str::random(5);
        }else{
            $slug = $slug_name;
        }

        $user = new User();
        $user->role_id = 2;
        $user->name = $request->name;
        $user->slug = $slug;
        $user->email = $request->email;
        $user->credits = $request->credits;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        if($request->preview)
        {
            $user->avatar = $request->preview;
        }
        $user->save();

       

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license
        ];

        $usermeta = new Usermeta();
        $usermeta->user_id = $user->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Agent Created');

    }

    public function agent_update(Request $request,$id)
    {
        $user = User::findOrfail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        if($request->password)
        {
            $validatedData = $request->validate([
                'password' => 'confirmed',
            ]);
        }

        $slug_name = Str::slug($request->name);

        $slug_generate = User::where('slug',$slug_name)->first();

        if($slug_generate)
        {
            if($slug_generate->id == $id)
            {
                $slug = $slug_generate->slug;
            }else{
                $slug = $slug_name.Str::random(5);
            }
            
        }else{
            $slug = $slug_name;
        }


        $user->name = $request->name;
        $user->slug = $slug;
        $user->credits = $request->credits;
        $user->email = $request->email;
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        if($request->preview)
        {
            $user->avatar = $request->preview;
        }
        $user->save();

        

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license
        ];

        $usermeta = Usermeta::where([
            ['user_id',$id],
            ['type','content']
        ])->first();
        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Agent Updated');

    }

    public function agency_create()
    {
       if (!Auth()->user()->can('agency.list')) {
           abort(401);
       }
        $users = User::where([
            ['role_id',2],
            ['status',1]
        ])->get();
        return view('plugin::agency.create',compact('users'));
    }

    public function agency_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'user_id' => 'required'
        ]);

        $slug_generate = Str::slug($request->name);
        $category_slug_get = Category::where('slug',$slug_generate)->first();
        if($category_slug_get)
        {
            $slug = $slug_generate.Str::random(5);
        }else{
            $slug = $slug_generate;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->type = 'agency';
        $category->user_id = Auth::User()->id;
        $category->status = $request->status;
        $category->save();

        foreach($request->user_id as $user)
        {
            $categoryuser = new Categoryuser();
            $categoryuser->category_id = $category->id;
            $categoryuser->user_id = $user;
            $categoryuser->save();
        }

        $usermeta = new Categorymeta();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'credit';
        $usermeta->content = null;
        $usermeta->save();

        $usermeta = new Categorymeta();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'preview';
        if($request->preview)
        {
            $usermeta->content = $request->preview;
        }else{
            $usermeta->content =null;
        }
        $usermeta->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license,
            'email' => $request->email
        ];

        $usermeta = new Categorymeta();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Agency Created');
    }

    public function agency_edit($id)
    {
        if (!Auth()->user()->can('agency.edit')) {
           abort(401);
       }
        $users = User::where([
            ['role_id',2],
            ['status',1]
        ])->get();
        $agency = Category::with('categorymeta','credit','users','preview')->findOrfail($id);

        $image = $agency->preview->content;
        return view('plugin::agency.edit',compact('agency','users','image'));
    }

    public function agency_update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'user_id' => 'required',
        ]);

        $slug_generate = Str::slug($request->name);
        $category_slug_get = Category::where('slug',$slug_generate)->first();
        if($category_slug_get)
        {
            $slug = $slug_generate.Str::random(5);
        }else{
            $slug = $slug_generate;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->type = 'agency';
        $category->user_id = Auth::User()->id;
        $category->status = $request->status;
        $category->save();

        Categoryuser::where('category_id',$category->id)->delete();

        foreach($request->user_id as $user)
        {
            $categoryuser = new CategoryUser();
            $categoryuser->category_id = $category->id;
            $categoryuser->user_id = $user;
            $categoryuser->save();
        }

        $usermeta = Categorymeta::where([
            ['category_id',$id],
            ['type','credit']
        ])->first();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'credit';
        $usermeta->content = null;
        $usermeta->save();

        $usermeta = Categorymeta::where([
            ['category_id',$id],
            ['type','preview']
        ])->first();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'preview';
        if($request->preview)
        {
            $usermeta->content = $request->preview;
        }else{
            $usermeta->content =null;
        }
        $usermeta->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license,
            'email' => $request->email
        ];

        $usermeta = Categorymeta::where([
            ['category_id',$id],
            ['type','content']
        ])->first();
        $usermeta->category_id = $category->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Agency Updated');
    }

    public function agent_create()
    {
        if (!Auth()->user()->can('user.create')) {
            abort(401);
        }
        $packages = Terms::where([
            ['type','package'],
            ['status',1]
        ])->get();
        return view('plugin::agent.create',compact('packages'));
    }

    public function agency(Request $request)
    {
        if (!Auth()->user()->can('agency.list')) {
           abort(401);
        }
        if(!empty($request->src)){
            $agencies = Category::with('agency')->where([
                ['type','agency'],
                [$request->type,$request->src]
            ])->latest()->paginate(20);
        }
        else{
            $agencies = Category::with('agency')->where([
                ['type','agency']
            ])->latest()->paginate(20);
        }
        

        return view('plugin::agency.index',compact('agencies','request'));
    }

    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('user.delete')) {
            abort(401);
        }
        if ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   User::destroy($id);
                   
                }
            }
        }
        return response()->json('Agent Deleted');
    }

    public function delete(Request $request)
    {
        if (!Auth()->user()->can('agency.delete')) {
           abort(401);
        }
        if ($request->status=='delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                   Category::destroy($id);
                }
            }
        }
        return response()->json('Agency Deleted');
    }

}