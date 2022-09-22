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
use App\Options;
class AgentController extends controller
{
    public function list(Request $request)
    {
        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle('Agents list');
        SEOMeta::setDescription($seo->description);
       

        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle('Agents list');
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle('Agents list');
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle('Agents list');
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));

       

        SEOTools::setTitle('Agents list');
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));
        if($request->name || $request->email)
        {
            $name = $request->name;
            $email = $request->email;
            $query = User::with('usermeta')->orWhere('name', 'like', "%{$name}%")->where([
                ['role_id',2],
                ['status',1]
            ])->paginate(6);
        }else{
            $query = null;
        }
        $agents = User::where([
            ['role_id',2],
            ['status',1]
        ])->count();

        return view('view::agent.list',compact('agents','query'));
    }

    public function agents_data()
    {
       
        $agents = User::whereHas('usermeta')->with('usermeta')->where([
            ['role_id',2],
            ['status',1]
        ])->latest()->paginate(6);
        
        if($agents->count() > 0)
        {
            return response()->json($agents);
        }else{
            return response()->json(['error'=>true]);
        }
        
    }
}