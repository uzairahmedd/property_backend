<?php

namespace Amcoders\Theme\jomidar\http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Category;
use App;
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
            $seo = Options::where('key', 'seo')->first();
            $seo = json_decode($seo->value);

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
            JsonLd::addImage(asset(content('header', 'logo')));



            SEOTools::setTitle($seo->title);
            SEOTools::setDescription($seo->description);
            SEOTools::opengraph()->setUrl(url('/'));
            SEOTools::setCanonical($seo->canonical);
            SEOTools::opengraph()->addProperty('keywords', $seo->tags);
            SEOTools::twitter()->setSite($seo->twitterTitle);
            SEOTools::jsonLd()->addImage(asset(content('header', 'logo')));
            $data = get_currency_info();
            $status = Category::where('type', 'status')->where('featured', 1)->inRandomOrder()->get();
            $categories = Category::where('type', 'category')->inRandomOrder()->get();
            $states = Category::where('type', 'states')->with('childrenCategories')->get();
            return view('theme::welcome.home', compact('status', 'categories', 'states'));
        } catch (\Exception $e) {
            return redirect()->route('install');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_home()
    {
        try {
            \DB::select('SHOW TABLES');
            $seo = Options::where('key', 'seo')->first();
            $seo = json_decode($seo->value);

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
            JsonLd::addImage(asset(content('header', 'logo')));



            SEOTools::setTitle($seo->title);
            SEOTools::setDescription($seo->description);
            SEOTools::opengraph()->setUrl(url('/'));
            SEOTools::setCanonical($seo->canonical);
            SEOTools::opengraph()->addProperty('keywords', $seo->tags);
            SEOTools::twitter()->setSite($seo->twitterTitle);
            SEOTools::jsonLd()->addImage(asset(content('header', 'logo')));
            $status = Category::where('type', 'status')->where('featured', 1)->inRandomOrder()->get();
            $categories = Category::where('type', 'category')->inRandomOrder()->get();
            $states = Category::where('type', 'states')->with('childrenCategories')->get();
            //for home rent and sell properties
            $status_properties = $this->status_property($status);
            $property_nature = Category::where('type', 'parent_category')->get();
            $property_type = Category::where('type', 'category')->with('child','icon')->get();
            return view('theme::newlayouts.pages.home', compact('status', 'categories', 'states', 'status_properties','property_type','property_nature'));
        } catch (\Exception $e) {
            return redirect()->route('install');
        }
    }


    /**
     * Make data for rent and sales properties
     *
     * @return data
     */
    public function status_property($status)
    {
        $data=[];
        foreach ($status as $status_data) {
            if ($status_data->name == 'Rent') {
                $rent_property = $this->get_status_property($status_data->id);
                $data['rent_property']= $rent_property ;
            }
            if ($status_data->name == 'Sale') {
                $sale_property = $this->get_status_property($status_data->id);
                $data['sell_property']= $sale_property ;
            }
        }
        return $data;
    }

     /**
     * return status properties
     *
     * @return data
     */
    public function get_status_property($request)
    {
        $this->status = $request;

        $posts = Terms::where('type', 'property')->where('status', 1)->whereHas('price')->whereHas('post_city')->with('description','area','post_preview', 'price', 'post_city', 'property_status_type')
            ->whereHas('property_status_type', function ($q) {
                if (!empty($this->status)) {
                    return $q->where('category_id', $this->status);
                }
                return $q;
            });
        $posts = $posts->latest()->get();
        return $posts;
    }

    /**
     * return status properties
     *
     * @return data
     */
    public function get_status_property_old($request)
    {
        $this->status = $request;

        $posts = Terms::where('type', 'property')->where('status', 1)->whereHas('min_price')->whereHas('max_price')->whereHas('post_city')->with('post_preview', 'min_price', 'max_price', 'post_city','property_status_type')
            ->whereHas('property_status_type', function ($q) {
                if (!empty($this->status)) {
                    return $q->where('category_id', $this->status);
                }
                return $q;
            });
        $posts = $posts->latest()->get();
        return $posts;
    }


    public function change_currency(Request $request)
    {
        $put_curryncy = Category::where('type', 'currency')->with('position')->findorFail($request->currency);
        Session::put('currency', $put_curryncy);
        $info['name'] = $put_curryncy->name;
        $info['id'] = $put_curryncy->id;
        $info['icon'] = $put_curryncy->slug;
        $info['rate'] = $put_curryncy->featured;
        $info['position'] = $put_curryncy->position->content;
        Session::put('currency_info', $info);
        return back();
    }

    /**
     *Change language of pages
     * @return response.
     */
    public function change(Request $request)
    {
//        dump($request->all());
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
//        dd(session()->get('locale'));
            return $respons = ['status' => 'success'];
    }
}
