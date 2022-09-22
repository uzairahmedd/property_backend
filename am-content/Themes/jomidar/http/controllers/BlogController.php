<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Terms;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Options;
class BlogController extends controller
{
    public function show($slug)
    {
        $blog = Terms::with('preview','content','user','excerpt')->where([
            ['status',1],
            ['slug',$slug],
            ['type','blog']
        ])->first();

        $latest_news = Terms::with('preview','excerpt')->where([
            ['status',1],
            ['type','blog']
        ])->take(4)->get();

        if($blog)
        {
          SEOMeta::setTitle($blog->title);
          SEOMeta::setDescription($blog->excerpt->content ?? '');
          SEOMeta::addMeta('article:published_time', $blog->updated_at->format('Y-m-d'), 'blog');

          OpenGraph::setDescription($blog->excerpt->content ?? '');
          OpenGraph::setTitle($blog->title);


          

          OpenGraph::addImage(asset($blog->preview->content ?? ''));
          JsonLdMulti::addImage(asset($blog->preview->content ?? ''));
          JsonLd::addImage(asset($blog->preview->content ?? ''));



          JsonLd::setTitle($blog->title);
          JsonLd::setDescription($blog->excerpt->content ?? '');
          JsonLd::setType('Property');

          JsonLdMulti::setTitle($blog->title);
          JsonLdMulti::setDescription($blog->excerpt->content ?? '');
          JsonLdMulti::setType('Property');
            return view('view::blog.show',compact('blog','latest_news'));
        }else{
            return abort(404);
        }
        
    }

    public function list(Request $request)
    {

          $seo=Options::where('key','seo')->first();
          $seo=json_decode($seo->value);

          SEOMeta::setTitle('Blog');
          SEOMeta::setDescription($seo->description);


          OpenGraph::setDescription($seo->description);
          OpenGraph::setTitle('Blog');
          OpenGraph::addProperty('keywords', $seo->tags);

          TwitterCard::setTitle($seo->title);
          TwitterCard::setSite($seo->twitterTitle);

          JsonLd::setTitle('Blog');
          JsonLd::setDescription($seo->description);
          JsonLd::addImage(asset(content('header','logo')));



          SEOTools::setTitle('Blog');
          SEOTools::setDescription($seo->description);
          SEOTools::setCanonical($seo->canonical);
          SEOTools::opengraph()->addProperty('keywords', $seo->tags);
          SEOTools::twitter()->setSite($seo->twitterTitle);
          SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        $latest_news = Terms::with('preview','excerpt','user')->where([
            ['status',1],
            ['type','blog']
        ])->take(4)->get();

        if($request->keyword)
        {
            $news = Terms::with('preview','excerpt','user')->where([
                ['status',1],
                ['title','like','%'.$request->keyword.'%'],
                ['type','blog']
            ])->paginate(4);
            $keyword = $request->keyword;
        }else{
            $news = Terms::with('preview','excerpt','user')->where([
                ['status',1],
                ['type','blog']
            ])->paginate(4);
            $keyword = null;
        }
        return view('view::blog.list',compact('news','latest_news','keyword'));
    }

    public function page_show($slug){
        $info = Terms::with('content','excerpt')->where([
            ['status',1],
            ['slug',$slug],
            ['type','page']
        ])->first();

         if ($info) {
            SEOMeta::setTitle($info->title);
            SEOMeta::setDescription($info->excerpt->content ?? '');
            SEOMeta::addMeta('article:published_time', $info->updated_at->format('Y-m-d'), 'blog');

            OpenGraph::setDescription($info->excerpt->content ?? '');
            OpenGraph::setTitle($info->title);

            $logo=asset(content('header','logo'));


            OpenGraph::addImage($logo);
            JsonLdMulti::addImage($logo);
            JsonLd::addImage($logo);



            JsonLd::setTitle($info->title);
            JsonLd::setDescription($info->excerpt->content ?? '');
            JsonLd::setType('Page');

            JsonLdMulti::setTitle($info->title);
            JsonLdMulti::setDescription($info->excerpt->content ?? '');
            JsonLdMulti::setType('Page'); 
            return view('view::page.show',compact('info'));
         }
         aboart(404);
    }
}