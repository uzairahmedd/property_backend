<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Review;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
class AgentshowController extends controller
{
    public function show($slug)
    {

        $agent = User::with('usermeta')->where('slug',$slug)->withCount('property')->first();
        
        if($agent)
        {

            $content=json_decode($agent->usermeta->usermeta ?? '');
            SEOMeta::setTitle($agent->name);
            OpenGraph::setTitle($agent->name);
            TwitterCard::setSite($agent->name);
            JsonLd::setTitle($agent->name);
            JsonLd::addImage(asset($agent->avatar));
            SEOTools::setTitle($agent->name);
            

            SEOTools::twitter()->setSite($agent->name);
            SEOTools::jsonLd()->addImage(asset($agent->avatar));
            if (!empty($content)) {
             SEOTools::setDescription($content->description);
             SEOMeta::setDescription($content->description);
             OpenGraph::setDescription($content->description);
            }
            



            $reviews = Review::where([
                ['user_id',$agent->id]
            ])->count();

            if($reviews > 0)
            {
                $reviews_ratting = Review::where([
                    ['user_id',$agent->id]
                ])->avg('rating');
            }else{
                $reviews_ratting = 0;
            }

            

            return view('view::agent.show',compact('agent','reviews','reviews_ratting'));
        }else{
            return abort(404);
        }
    }

    public function property_get($slug)
    {
        $user = User::where([
            ['slug',$slug],
            ['status',1]
        ])->first();
        
        $property = $user->property()->paginate(10);
        if($property->count() > 0)
        {
            return response()->json($property);
        }else{
            return response()->json(['error'=>'No Data Found']);
        }
    }

    public function review_get(Request $request)
    {
        $reviews = Review::where([
            ['user_id',$request->user_id]
        ])->paginate(20);

        if($reviews->count() > 0)
        {
            return response()->json($reviews);
        }else{
            return response()->json(['error'=>'No Data Found']);
        }
    }

}