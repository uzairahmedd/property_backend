<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Category;
use Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Options;
class WelcomeController extends controller
{
	
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            \DB::select('SHOW TABLES');
        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle($seo->title);
        SEOMeta::setDescription($seo->description);
        SEOMeta::setCanonical($seo->canonical);

        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle($seo->title);
        OpenGraph::setUrl($seo->canonical);
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle($seo->title);
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle($seo->title);
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));

       

        SEOTools::setTitle($seo->title);
        SEOTools::setDescription($seo->description);
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));
        $data= get_currency_info();
        $status=Category::where('type','status')->where('featured',1)->inRandomOrder()->get();
        $categories=Category::where('type','category')->inRandomOrder()->get();
        $states=Category::where('type','states')->with('childrenCategories')->get();
        return view('theme::welcome.home',compact('status','categories','states'));
        } catch (\Exception $e) {
            return redirect()->route('install');
        }
    }

    public function change_currency(Request $request){
       $put_curryncy=Category::where('type','currency')->with('position')->findorFail($request->currency);
       Session::put('currency', $put_curryncy);
       $info['name']=$put_curryncy->name;
       $info['id']=$put_curryncy->id;
       $info['icon']=$put_curryncy->slug;
       $info['rate']=$put_curryncy->featured;
       $info['position']=$put_curryncy->position->content;
       Session::put('currency_info', $info);
       return back();
    }
    
}