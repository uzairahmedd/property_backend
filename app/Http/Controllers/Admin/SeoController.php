<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Options;
use App\Terms;
use App\Models\User;
use Auth;
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;
class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!Auth()->user()->can('seo')) {
            abort(401);
        }
       $settings=Options::where('key','seo')->first();
       $info=json_decode($settings->value);

       return view('admin.seo.index',compact('info'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $seo['title']=$request->title;
        $seo['description']=$request->description;
        $seo['canonical']=$request->canonical;
        $seo['tags']=$request->tags;
        $seo['twitterTitle']=$request->twitterTitle;

        $json=json_encode($seo);

        $settings=Options::where('key','seo')->first();

        $settings->value=$json;
        $settings->save();
        return response()->json('Site Seo Updated');
        
    }

    public function update(Request $request,$id)
    {

        $index = new Index(base_path('sitemap.xml'));
        $index->addSitemap(url('/'));
        $index->addSitemap(url('/contact'));
        $index->addSitemap(url('/list'));
        $index->addSitemap(url('/map'));
        $index->addSitemap(url('/agency/list'));
        $index->addSitemap(url('/agent/list'));
        $index->addSitemap(url('/project'));
        $index->addSitemap(url('/blog'));
        
        



        $properties=Terms::where('type','property')->latest()->get();
        $projects=Terms::where('type','project')->latest()->get();
        $blogs=Terms::where('type','blog')->latest()->get();
        $pages=Terms::where('type','page')->latest()->get();
        $states=\App\Category::where('type','states')->where('status',1)->get();
        $agencies=\App\Category::where('type','agency')->where('status',1)->get();
        $agents=User::whereHas('terms')->where('status',1)->get();
        
        foreach ($properties as $key => $value) {
         $index->addSitemap(url('/').'/property/'.$value->slug);        
        }

        foreach ($projects as $key => $value) {
         $index->addSitemap(url('/').'/project/'.$value->slug);        
        }

        foreach ($blogs as $key => $value) {
         $index->addSitemap(url('/').'/blog/'.$value->slug);        
        }

        foreach ($pages as $key => $value) {
         $index->addSitemap(url('/').'/page/'.$value->slug);        
        }

        foreach ($states as $key => $value) {
         $index->addSitemap(url('/').'/state/'.$value->slug);        
        }

        foreach ($agencies as $key => $value) {
         $index->addSitemap(url('/').'/agency/'.$value->slug.'/show');        
        }
        
        foreach ($agents as $key => $value) {
         $index->addSitemap(url('/').'/agent/'.$value->slug.'/show');        
        }




        // foreach ($states as $key => $value) {
        //  $index->addSitemap(url('/').'/agency/'.$value->slug.'/show');        
        // }



       // foreach ($data['static'] as $key => $value) {
       //   $index->addSitemap($value['url']);
       // }  


        
       
       $check= $index->write();
      
        return response()->json('New Sitemap Generated');
    }

   
}
