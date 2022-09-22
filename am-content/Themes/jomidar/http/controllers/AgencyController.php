<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Terms;
use App\Models\Review;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Options;
class AgencyController extends controller
{
    public function show($slug)
    {
        $agency = Category::with('preview','categorymeta','agency_lists')->where([
            ['slug',$slug],
            ['type','agency'],
            ['status',1]
        ])->first();

        if($agency)
        {

             $content=json_decode($agency->categorymeta->content ?? '');
            SEOMeta::setTitle($agency->name);
            OpenGraph::setTitle($agency->name);
            TwitterCard::setSite($agency->name);
            JsonLd::setTitle($agency->name);
            JsonLd::addImage(asset($agency->preview->content ?? ''));
            SEOTools::setTitle($agency->name);
            

            SEOTools::twitter()->setSite($agency->name);
            SEOTools::jsonLd()->addImage(asset($agency->preview->content ?? ''));
            if (!empty($content)) {
             SEOTools::setDescription($content->description);
             SEOMeta::setDescription($content->description);
             OpenGraph::setDescription($content->description);
            }
            

            $data = [];

            foreach($agency->agency_lists as $agent)
            {
                array_push($data,$agent->user->id);
            }

            $review_count = Review::whereIn('user_id',$data)->avg('rating');
            return view('view::agency.show',compact('agency','review_count'));
        }else{
            return abort(404);
        }
    }

    public function list()
    {
        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle('Agencies');
        SEOMeta::setDescription($seo->description);
       

        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle('Agencies');
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle('Agencies');
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle('Agencies');
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));

       

        SEOTools::setTitle('Agencies');
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        $agency = Category::where([
            ['type','agency'],
            ['status',1]
        ])->count();
        return view('view::agency.list',compact('agency'));
    }

    public function agent_list(Request $request)
    {
        $agents = Category::with('agency')->where([
            ['slug',$request->slug],
            ['type','agency'],
            ['status',1]
        ])->first();

        return response()->json($agents->agency);
    }

    public function agency_data()
    {
        $agency = Category::with('preview','categorymeta')->where([
            ['type','agency'],
            ['status',1]
        ])->paginate(4);

        if($agency->count() > 0)
        {
            return response()->json($agency);
        }else{
            return response()->json(['error'=>true]);
        }
        
    }

    public function property_list(Request $request)
    {
        $agents = Category::with('agency_lists')->where([
            ['slug',$request->slug],
            ['type','agency'],
            ['status',1]
        ])->first();

       

        $data = [];

        foreach($agents->agency_lists as $agent)
        {
            array_push($data,$agent->user->id);
        }

        $property = Terms::with('post_preview','min_price','max_price','post_city','post_state','user','featured_option','latitude','longitude')->whereIn('user_id',$data)->where([
            ['type','property'],
            ['status',1]
        ])->paginate(20);

        if($property->count() > 0)
        {
            return response()->json($property);
        }else{
            return response()->json(['error'=>true]);
        }

        
        
    }

    public function review_list(Request $request)
    {
        $agents = Category::with('agency_lists')->where([
            ['slug',$request->slug],
            ['type','agency'],
            ['status',1]
        ])->first();

        $data = [];

        foreach($agents->agency_lists as $agent)
        {
            array_push($data,$agent->user->id);
        }

        $reviews = Review::whereIn('user_id',$data)->paginate(20);

        $review_count = Review::whereIn('user_id',$data)->count();

        if($reviews->count() > 0)
        {
            return response()->json(['review_list'=> $reviews,'review_count'=>$review_count]);
        }else{
            return response()->json(['review_list'=> $reviews,'review_count'=>$review_count,'error'=>true]);
        }
    }
}