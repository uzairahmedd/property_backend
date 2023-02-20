<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use App\Media;
use App\Meta;
use App\Models\Mediapost;
use App\Options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Terms;
use Hash;
use Image;
use App\Usermeta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
/**
 *
 */
class ProfileController extends controller
{
    public function index()
    {
        $property_count=Terms::where('type', 'property')->where('status', 1)->where('user_id', Auth::id())->count();
        return view('theme::newlayouts.user_dashboard.profile',compact('property_count'));
        // return view('view::agent.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::User();
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()[0]]);
        }

        if($request->current_password)
        {
            $validator = \Validator::make($request->all(), [
                'current_password' => 'password',
                'password' => 'required|confirmed'
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()[0]]);
            }

            $user->password = Hash::make($request->password);

        }



        $user->name = $request->name;
        $str_slug = Str::slug($request->name);
        $slug_check = User::where('slug',$str_slug)->first();
        if($slug_check)
        {
            $slug = $str_slug.Str::random(5);
        }else{
            $slug = $str_slug;
        }
        $user->slug = $slug;
        $user->email = $request->email;
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
            ['user_id',$user->id],
            ['type','content']
        ])->first();
        if(empty($usermeta)){
            $usermeta = new Usermeta();
            $usermeta->user_id=$user->id;
            $usermeta->type='content';
        }

        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Settings Updated');


    }

    public function viewProfile()
    {
        $info = User::where('id', Auth::id())->first();
        return success_response(['imageName' => $info->avatar, 'Image get successfully']);
    }


    public function profile_img(Request $request){

        $user_id = Auth::User()->id;
        $validator = \Validator::make($request->all(), [
            'picture.*' => 'mimes:jpeg,jpg,png|max:20480',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        if ($request->hasfile('picture'))
                $image= $request->file('picture');
                $ext = $image->getClientOriginalExtension();
                if ($ext == 'jfif') {
                    return back()->withErrors(['error' => 'PLease provide jpg/png images'])->withInput();
            }
        if ($request->hasFile('picture')) {
            $completeFileName = $request->file('picture')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
//            $path = $request->file('picture')->storeAs('public/assets/images/profile', $compPic);
//            $imageName = time().'.'.$request->image->extension();
            $path = $request->picture->move(public_path('assets/images/profile'), $compPic);
            $user = User::where('id', $user_id)->update([
                'avatar'=>$compPic
            ]);

         return success_response(['imageName' => $compPic, 'Image Uploaded successfully']);

        }
    }

}
