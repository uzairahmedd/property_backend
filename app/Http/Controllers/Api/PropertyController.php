<?php 

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Meta;
use App\Options;
use App\Category;
use App\Models\Review;
use App\PostCategory;
use CentralApps\MortgageCalculator\Calculator;
use Auth;
use Str;
use Session;
use Cart;
use Amcoders\Plugin\sendmail\Helper\Propertymailsend;
use Amcoders\Theme\jomidar\http\controllers\DataController;
use App\Http\Resources\PropertyResource;
use App\Models\User;
use App\Models\Price;
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
    public function show(Request $request, $slug)
    {
        // $path= $request->path();

        $property = Terms::where([
            ['type','property'],
            ['status',1],
            ['slug',$slug]
        ])->with('post_preview','min_price','max_price','post_city','post_state','user','content','multiple_images','option_data','facilities_get','contact_type','latitude','longitude','excerpt')->withCount('reviews')->first();
        


        if($property){
            return response()->json($property, 200);
        } else {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // $check_credit = Auth::user()->credits;
        // $post_credit = Category::where('type', 'category')->with('creditcharge')->findorFail($request->category);
        // $post_credit = (int)$post_credit->creditcharge->content;

        // if ($post_credit > $check_credit) {
        //     Session::flash('error', 'credit limit exceeded please recharge your credit');
        //     return redirect()->route('agent.package.index');
        // }
        // $new_credit = $check_credit - $post_credit;

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'category' => 'required',
            'min_price' => 'required|max:100',
            'max_price' => 'required|max:100',
        ]);

        $slug = Str::slug($request->title);
        $count = Terms::where('type', 'property')->where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . rand(40, 60) . $count;
        }

        $term = new Terms;
        $term->title = $request->title;
        $term->resource = 1;
        $term->slug = $slug;
        $term->user_id = $user->id;
        $term->status = 3;
        $term->type = 'property';
        $term->save();

        $meta = new Meta;
        $meta->term_id = $term->id;
        $meta->type = 'excerpt';
        $meta->content = '';
        $meta->save();

        $meta = new Meta;
        $meta->term_id = $term->id;
        $meta->type = 'content';
        $meta->content = '';
        $meta->save();

        $json['contact_type'] = "mail";
        $json['email'] = $user->email;

        $meta = new Meta;
        $meta->term_id = $term->id;
        $meta->type = 'contact_type';
        $meta->content = json_encode($json);
        $meta->save();

        $min_price = new Price;
        $min_price->type = "min_price";
        $min_price->term_id = $term->id;
        $min_price->price = $request->min_price;
        $min_price->save();

        $max_price = new Price;
        $max_price->type = "max_price";
        $max_price->term_id = $term->id;
        $max_price->price = $request->max_price;
        $max_price->save();


        $cat = PostCategory::insert(['term_id' => $term->id, 'category_id' => $request->category]);
        // Session::flash("flash_notification", [
        //     "level"     => "success",
        //     "message"   => "Property Created Successfully"
        // ]);

        $user = User::find($user->id);
        // $user->credits = $new_credit;
        $user->save();

        if($term){
            return response()->json($term, 200);
        } else {
            return response()->json(['error' => 'Error creating property'], 422);
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

    // listings
    public function listings(Request $request){
        $data_crtl = new DataController();
        return $data_crtl->get_properties_data($request, true);
    }

    // listing details
    public function listing(Request $request, $slug){
        $property = Terms::where([
            ['type','property'],
            ['status',1],
            ['slug',$slug]
        ])->with('post_preview','min_price','max_price','post_city','post_state','user','content','multiple_images','option_data','facilities_get','contact_type','latitude','longitude','excerpt')->withCount('reviews')->first();

        return new PropertyResource($property);
    }

    public function categories(){
        $categories = Category::whereIn('type', ['category', 'feature', 'option', 'states', 'facilities'])->get()->groupBy('type');
        return response()->json($categories, 200);
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