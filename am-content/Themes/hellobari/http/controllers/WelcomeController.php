<?php

namespace Amcoders\Theme\hellobari\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            return view('theme::welcome.home');

        } catch (\Exception $e) {
            return redirect()->route('install');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
