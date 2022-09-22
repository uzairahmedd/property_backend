<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Options;
use File;
class SettingsController extends Controller
{
    public function google_analytics(){
        return view('admin.settings.google_analytics');
    }

    public function google_analytics_update(Request $request){
        if ($request->file) {
           $path='uploads/';
           $fileName = 'service-account-credentials.'.$request->file->extension();
           $request->file->move($path,$fileName);
       }

       return response()->json(['Service Account Updated']);
    }

   
    public function theme_settings()
    {
      
    	$info=Options::where('key','theme_data')->first();
    	$info=json_decode($info->value);
    	return view('admin.theme.theme_settings',compact('info'));
    }

    public function theme_settings_update(Request $request)
    {
    	$validatedData = $request->validate([
    		'logo' => 'max:1000|mimes:png',
    		'favicon' => 'max:100|mimes:ico',
    	]);

    	if ($request->logo) {
    		 $request->logo->move('uploads', 'logo.png'); 
    	}

    	if ($request->favicon) {
    		 $request->favicon->move('uploads', 'favicon.ico'); 
    	}
    	$links=[];
    	foreach ($request->icon as $key => $value) {
    		$data['icon']=$value;
    		$data['url']=$request->url[$key];
    		array_push($links, $data);
    	}

    	$content['theme_color']=$request->color;
    	$content['socials']=$links;
    	$content['back_to_top']=$request->back_to_top;

    	$color=Options::where('key','theme_data')->first();
    	$color->value=json_encode($content);
    	$color->save();

    	return response()->json(['Settings Updated']);
    }
}
