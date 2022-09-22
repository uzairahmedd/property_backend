<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Amcoders\Plugin\contactform\Contact;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Options;
class ContactController extends controller
{
    public function index()
    {
        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle('Contact us');
        SEOMeta::setDescription($seo->description);
        SEOMeta::setCanonical($seo->canonical);

        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle('Contact us');
        OpenGraph::setUrl($seo->canonical);
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle('Contact us');
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle('Contact us');
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));

       

        SEOTools::setTitle('Contact us');
        SEOTools::setDescription($seo->description);
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        return view('view::contact.index');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if(env('NOCAPTCHA_SITEKEY') != null){
           $messages = [
                'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            ];

            $validator = \Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|captcha'
            ], $messages);
        }
       



        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()[0]]);
        }

        Contact::send($request->name,$request->email,$request->subject,$request->message);

        return response()->json('success');
    }
}