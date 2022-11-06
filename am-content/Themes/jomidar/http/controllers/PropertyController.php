<?php

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Options;
use App\Category;
use App\Models\Review;
use CentralApps\MortgageCalculator\Calculator;
use Auth;
use Cart;
use Amcoders\Plugin\sendmail\Helper\Propertymailsend;
use App\Models\User;
use DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
class PropertyController extends controller
{
	   protected $property_type;
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        $path= $request->path();

        $property = Terms::where([
            ['type','property'],
            ['status',1],
            ['slug',$slug]
        ])->with('post_preview','min_price','max_price','post_city','post_state','user','content','multiple_images','option_data','facilities_get','contact_type','latitude','longitude','excerpt')->withCount('reviews')->first();



        if($property)
        {
            SEOMeta::setTitle($property->title);
            SEOMeta::setDescription($property->excerpt->content ?? '');
            SEOMeta::addMeta('article:published_time', $property->updated_at->format('Y-m-d'), 'property');

            OpenGraph::setDescription($property->excerpt->content ?? '');
            OpenGraph::setTitle($property->title);


            foreach($property->multiple_images ?? [] as $row){

              OpenGraph::addImage(asset($row->media->url));
              JsonLdMulti::addImage(asset($row->media->url));
              JsonLd::addImage(asset($row->media->url));
          }


          JsonLd::setTitle($property->title);
          JsonLd::setDescription($property->excerpt->content ?? '');
          JsonLd::setType('Property');

          JsonLdMulti::setTitle($property->title);
          JsonLdMulti::setDescription($property->excerpt->content ?? '');
          JsonLdMulti::setType('Property');
            return view('view::property.details',compact('property','path'));
        }else{
            return abort(404);
        }
    }

    public function project_view(Request $request,$slug)
    {


        $property = Terms::where([
            ['type','project'],
            ['status',1],
            ['slug',$slug]
        ])->with('post_preview','min_price','max_price','post_city','post_state','user','content','multiple_images','option_data','facilities_get','contact_type','latitude','longitude','finished_at','open_sell_date','excerpt')->withCount('reviews')->first();

        if($property)
        {

            SEOMeta::setTitle($property->title);
            SEOMeta::setDescription($property->excerpt->content ?? '');
            SEOMeta::addMeta('article:published_time', $property->updated_at->format('Y-m-d'), 'property');

            OpenGraph::setDescription($property->excerpt->content ?? '');
            OpenGraph::setTitle($property->title);


            foreach($property->multiple_images ?? [] as $row){

              OpenGraph::addImage(asset($row->media->url));
              JsonLdMulti::addImage(asset($row->media->url));
              JsonLd::addImage(asset($row->media->url));
            }


            JsonLd::setTitle($property->title);
            JsonLd::setDescription($property->excerpt->content ?? '');
            JsonLd::setType('Project');

            JsonLdMulti::setTitle($property->title);
            JsonLdMulti::setDescription($property->excerpt->content ?? '');
            JsonLdMulti::setType('Project');

            return view('view::project.show',compact('property'));
        }else{
            return abort(404);
        }


    }

    public function city(Request $request, $slug){
        $state=Category::where('type','states')->where('slug',$slug)->where('status',1)->first();

        if(empty($state)){
            abort(404);
        }

        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle($state->name);
        SEOMeta::setDescription($seo->description);


        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle($state->name);
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle($state->name);
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle($state->name);
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset($state->preview->content));



        SEOTools::setTitle($state->name);
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset($state->preview->content));


        $status=$request->status ?? null;
        $location=$request->location ?? null;

        $state=$state->id ?? null;
        $badroom=$request->badroom[16] ?? null;
        $bathroom=$request->bathroom[17] ?? null;
        $floor=$request->floor[18] ?? null;
        $block=$request->block[15] ?? null;
        $min_price=$request->min_price ?? null;
        $max_price=$request->max_price ?? null;
        $src=$request->src ?? null;

         $input_array=[];
        if($request->category){
           $category=Category::where('type','category')->with('parent')->findorFail($request->category);
           foreach($category->parent as $row){
            array_push($input_array,$row->id);
           }
        }
        else{
             $category=null;
        }

        $statuses=Category::where('type','status')->where('featured',1)->inRandomOrder()->get();

        $states=Category::where('type','states')->get();
        $categories=Category::where('type','category')->get();



        $category= $request->category ?? null;
        return view('view::property.list',compact('category','state','min_price','max_price','status','location','statuses','categories','states','badroom','bathroom','floor','block','input_array','src'));
    }

    public function list(Request $request){

        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle('Property list');
        SEOMeta::setDescription($seo->description);


        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle('Property list');
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle('Property list');
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle('Property list');
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));



        SEOTools::setTitle('Property list');
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        $status=$request->status ?? null;
        $location=$request->location ?? null;

        $state=$request->state ?? null;
        $badroom=$request->badroom[16] ?? null;
        $bathroom=$request->bathroom[17] ?? null;
        $floor=$request->floor[18] ?? null;
        $block=$request->block[15] ?? null;
        $min_price=$request->min_price ?? null;
        $max_price=$request->max_price ?? null;
        $src=$request->src ?? null;

         $input_array=[];
        if($request->category){
           $category=Category::where('type','category')->with('parent')->findorFail($request->category);
           foreach($category->parent as $row){
            array_push($input_array,$row->id);
           }
        }
        else{
             $category=null;
        }

        $statuses=Category::where('type','status')->where('featured',1)->inRandomOrder()->get();

        $states=Category::where('type','states')->get();
        $categories=Category::where('type','category')->get();



        $category= $request->category;
        return view('view::property.list',compact('category','state','min_price','max_price','status','location','statuses','categories','states','badroom','bathroom','floor','block','input_array','src'));
    }


//    Property List of Khiaratee Project


    public function new_list(Request $request){

        $seo=Options::where('key','seo')->first();
        $seo=json_decode($seo->value);

        SEOMeta::setTitle('Property list');
        SEOMeta::setDescription($seo->description);


        OpenGraph::setDescription($seo->description);
        OpenGraph::setTitle('Property list');
        OpenGraph::addProperty('keywords', $seo->tags);

        TwitterCard::setTitle('Property list');
        TwitterCard::setSite($seo->twitterTitle);

        JsonLd::setTitle('Property list');
        JsonLd::setDescription($seo->description);
        JsonLd::addImage(asset(content('header','logo')));



        SEOTools::setTitle('Property list');
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical($seo->canonical);
        SEOTools::opengraph()->addProperty('keywords', $seo->tags);
        SEOTools::twitter()->setSite($seo->twitterTitle);
        SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        $status=$request->status ?? null;
        $location=$request->location ?? null;

        $state=$request->state ?? null;
        $badroom=$request->badroom[16] ?? null;
        $bathroom=$request->bathroom[17] ?? null;
        $floor=$request->floor[18] ?? null;
        $block=$request->block[15] ?? null;
        $min_price=$request->min_price ?? null;
        $max_price=$request->max_price ?? null;
        $src=$request->src ?? null;

        $input_array=[];
        if($request->category){
            $category=Category::where('type','category')->with('parent')->findorFail($request->category);
            foreach($category->parent as $row){
                array_push($input_array,$row->id);
            }
        }
        else{
            $category=null;
        }

        $statuses=Category::where('type','status')->where('featured',1)->inRandomOrder()->get();

        $states=Category::where('type','states')->get();
        $categories=Category::where('type','category')->get();



        $category= $request->category;
        return view('theme::newlayouts.pages.property_lists',compact('category','state','min_price','max_price','status','location','statuses','categories','states','badroom','bathroom','floor','block','input_array','src'));
    }

    public function property_detail()
    {
        return view('theme::newlayouts.pages.property_detail');
    }

    public function property_auction()
    {
        return view('theme::newlayouts.pages.property_auction');
    }

    public function userboard_profile()
    {
        return view('theme::newlayouts.user_dashboard.profile');
    }

    public function userboard_favorite()
    {
        return view('theme::newlayouts.user_dashboard.favorite');
    }

    public function userboard_auction()
    {
        return view('theme::newlayouts.user_dashboard.auction');
    }

    public function userboard_account()
    {
        return view('theme::newlayouts.user_dashboard.account');
    }

    public function step_one()
    {
        return view('theme::newlayouts.property_dashboard.step_one');
    }

    public function step_two()
    {
        return view('theme::newlayouts.property_dashboard.step_two');
    }

    public function step_three()
    {
        return view('theme::newlayouts.property_dashboard.step_three');
    }

    public function step_four()
    {
        return view('theme::newlayouts.property_dashboard.step_four');
    }

    public function step_five()
    {
        return view('theme::newlayouts.property_dashboard.step_five');
    }

    public function step_six()
    {
        return view('theme::newlayouts.property_dashboard.step_six');
    }

    public function step_finish()
    {
        return view('theme::newlayouts.property_dashboard.step_finish');
    }

    public function policy_terms()
    {
        return view('theme::newlayouts.pages.policy_terms');
    }

    public function terms_of_use()
    {
        return view('theme::newlayouts.pages.terms_of_use');
    }

    public function map(Request $request){

       $seo=Options::where('key','seo')->first();
       $seo=json_decode($seo->value);

       SEOMeta::setTitle('Property list');
       SEOMeta::setDescription($seo->description);


       OpenGraph::setDescription($seo->description);
       OpenGraph::setTitle('Property list');
       OpenGraph::addProperty('keywords', $seo->tags);

       TwitterCard::setTitle('Property list');
       TwitterCard::setSite($seo->twitterTitle);

       JsonLd::setTitle('Property list');
       JsonLd::setDescription($seo->description);
       JsonLd::addImage(asset(content('header','logo')));



       SEOTools::setTitle('Property list');
       SEOTools::setDescription($seo->description);
       SEOTools::setCanonical($seo->canonical);
       SEOTools::opengraph()->addProperty('keywords', $seo->tags);
       SEOTools::twitter()->setSite($seo->twitterTitle);
       SEOTools::jsonLd()->addImage(asset(content('header','logo')));

        $status=$request->status ?? null;
        $location=$request->location ?? null;

        $state=$request->state ?? null;
        $badroom=$request->badroom[16] ?? null;
        $bathroom=$request->bathroom[17] ?? null;
        $floor=$request->floor[18] ?? null;
        $block=$request->block[15] ?? null;
        $min_price=$request->min_price ?? null;
        $max_price=$request->max_price ?? null;
        $src=$request->src ?? null;

         $input_array=[];
        if($request->category){
           $category=Category::where('type','category')->with('parent')->findorFail($request->category);
           foreach($category->parent as $row){
            array_push($input_array,$row->id);
           }
        }
        else{
             $category=null;
        }

        $statuses=Category::where('type','status')->where('featured',1)->inRandomOrder()->get();

        $states=Category::where('type','states')->get();
        $categories=Category::where('type','category')->get();

        if($request->state){
            $lat_long= Category::where('type','states')->with('map')->find($request->state);
            $lat_info= json_decode($lat_long->map->content ?? '');
            $lat=$lat_info->latitude ?? 00.00;
            $long=$lat_info->longitude ?? 00.00;
            $zoom=$lat_info->zoom ?? 00.00;
        }
        else{
            $default_map=Options::where('key','default_lat_long')->first();
            $lat_info= json_decode($default_map->value ?? '');
            $lat=$lat_info->latitude ?? 00.00;
            $long=$lat_info->longitude ?? 00.00;
            $zoom=$lat_info->zoom ?? 00.00;
        }


        $category= $request->category;
        return view('view::property.map',compact('category','state','min_price','max_price','status','location','statuses','categories','states','badroom','bathroom','floor','block','input_array','src','lat','long','zoom'));

    }

    public function project(Request $request){
       $seo=Options::where('key','seo')->first();
       $seo=json_decode($seo->value);

       SEOMeta::setTitle('Project list');
       SEOMeta::setDescription($seo->description);


       OpenGraph::setDescription($seo->description);
       OpenGraph::setTitle('Project list');
       OpenGraph::addProperty('keywords', $seo->tags);

       TwitterCard::setTitle('Project list');
       TwitterCard::setSite($seo->twitterTitle);

       JsonLd::setTitle('Project list');
       JsonLd::setDescription($seo->description);
       JsonLd::addImage(asset(content('header','logo')));



       SEOTools::setTitle('Project list');
       SEOTools::setDescription($seo->description);
       SEOTools::setCanonical($seo->canonical);
       SEOTools::opengraph()->addProperty('keywords', $seo->tags);
       SEOTools::twitter()->setSite($seo->twitterTitle);
       SEOTools::jsonLd()->addImage(asset(content('header','logo')));
       $states=Category::where('type','states')->get();
       $categories=Category::where('type','category')->get();
       $category= $request->category;
       $state=$request->state ?? null;
       $src=$request->src;
       return view('view::project.list',compact('states','categories','category','state','src'));
    }

    public function favourite(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::User();
            $isFavourite = $user->favourite_properties()->where('terms_id',$request->id)->count();
            if($isFavourite == 0)
            {
                $user->favourite_properties()->attach($request->id);
                return response()->json(['status'=>true]);
            }else{
                $user->favourite_properties()->detach($request->id);
                return response()->json(['status'=>false]);
            }
        }else{
            return response()->json(['error'=>true]);
        }

    }

    public function reviews(Request $request)
    {

        $property = Terms::findOrFail($request->id);
        $reviews = $property->reviews()->paginate(20);

        if($reviews->count() > 0)
        {
            return response()->json($reviews);
        }else{
            return response()->json('error');
        }


    }

    public function review_store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
            'rating' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()[0]]);
        }

        $review = new Review();
        $review->term_id = $request->property_id;
        $review->user_id = $request->user_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        return response()->json('Review Sent');
    }

    public function inquiryform(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
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
            return response()->json(['error'=>$validator->errors()->all()[0]]);
        }

        Propertymailsend::send($request->name,$request->email,$request->message,$request->agent_email);

        return response()->json(['success']);
    }

    public function calculator(Request $request)
    {
        if($request->price == 0)
        {
            return response()->json(['error'=>'Incorrect Information']);
        }
        if($request->interest == 0)
        {
            return response()->json(['error'=>'Incorrect Information']);
        }
        if($request->year == 0)
        {
            return response()->json(['error'=>'Incorrect Information']);
        }
        $calculator = new Calculator();
        $calculator->setAmountBorrowed( $request->price );
        $calculator->setInterestRate( $request->interest );
        $calculator->setYears( $request->year );
        return response()->json(['repement_cost'=>$calculator->calculateRepayment(). PHP_EOL,'interest_cost'=> $calculator->calculateInterestOnlyPayment(). PHP_EOL]);
    }

    public function similar_property(Request $request)
    {
        $user = User::findOrFail($request->agent_id);

        $properties = $user->property()->where('status',1)->take(3)->get();

        return response()->json($properties);
    }

    public function favourite_check(Request $request)
    {
        if(Auth::check())
        {
            $data = DB::table('terms_user')->where([
                ['terms_id',$request->id],
                ['user_id',Auth::User()->id]
            ])->first();

            if($data)
            {
                return "ok";
            }else{
                return "no";
            }
        }else{
            return "no";
        }
    }

}
