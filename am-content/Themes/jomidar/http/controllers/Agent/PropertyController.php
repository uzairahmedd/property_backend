<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Controllers\Admin\MediaController;
use App\Terms;
use App\Meta;
use App\PostCategory;
use App\Options;
use Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Mediapost;
use App\Media;
use App\Models\Postcategoryoption;
use App\Models\Termrelation;
use App\Models\Price;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Auth;

class PropertyController extends controller
{
    protected $term_id;
    protected $property_type;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Terms::where('type', 'property')->with('property_type', 'property_status_type', 'post_city')->where('user_id', Auth::id())->latest()->paginate(20);
        return view('view::agent.property.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency = default_currency();
        $categories = Category::where('type', 'category')->get();

        return view('view::agent.property.create', compact('categories', 'currency'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $check_credit = Auth::user()->credits;
        $post_credit = Category::where('type', 'category')->with('creditcharge')->findorFail($request->category);
        $post_credit = (int)$post_credit->creditcharge->content;

        if ($post_credit > $check_credit) {
            Session::flash('error', 'credit limit exceeded please recharge your credit');
            return redirect()->route('agent.package.index');
        }
        $new_credit = $check_credit - $post_credit;

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
        $term->slug = $slug;
        $term->user_id = Auth::id();
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
        $json['email'] = Auth::user()->email;

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
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Property Created Successfully"
        ]);

        $user = User::find(Auth::id());
        $user->credits = $new_credit;
        $user->save();

        return redirect()->route('agent.property.edit', $term->id);
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
        $this->term_id = $id;


        $info = Terms::with('excerpt', 'content', 'postcategory', 'latitude', 'longitude', 'city', 'medias', 'facilities', 'options', 'child', 'min_price', 'max_price', 'floor_plans', 'contact_type')->where('user_id', Auth::id())->findorFail($id);
        $contact_type = json_decode($info->contact_type->content ?? '');

        $input_options = Category::where('type', 'option')->with(['post_category_option' => function ($q) {
            return $q->where('term_id', $this->term_id);
        }])->get();

        $array = [];
        $property_type = null;
        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
            if ($value->type == 'category') {
                $this->property_type = $value->category_id;
            }
        }


        foreach ($info->facilities as $key => $row) {
            array_push($array, $row->category_id);
        }

        $input_options = Category::where('type', 'option')->whereHas('child', function ($q) {
            return $q->where('id', $this->property_type);
        })->with(['post_category_option' => function ($q) {
            return $q->where('term_id', $this->term_id);
        }])->get();

        if (count($input_options) == 0) {

            $input_options = Category::where('type', 'option')->whereHas('post_category_option', function ($q) {
                return $q->where('term_id', $this->term_id);
            })->with(['post_category_option' => function ($q) {
                return $q->where('term_id', $this->term_id);
            }])->get();
        }

        $facilities = Category::where('type', 'facilities')->get();

        $child = $info->child->child_id ?? null;

        return view('view::agent.property.edit', compact('info', 'input_options', 'array', 'facilities', 'child', 'contact_type'));
    }

    public function contact_type(Request $request, $id)
    {

        $meta = Meta::where('type', 'contact_type')->with('term')->where('term_id', $id)->first();
        if (!empty($meta)) {
            if ($meta->term->user_id !== Auth::id()) {
                return abort(401);
            }
        }
        if (empty($meta)) {
            $meta = new Meta;
            $meta->type = 'contact_type';
            $meta->term_id = $id;
        }
        if ($request->contact_type == 'mail') {
            $validatedData = $request->validate([
                'email' => 'required|email|max:100',
            ]);


            $data['contact_type'] = 'mail';
            $data['email'] = $request->email;

            $meta->content = json_encode($data);
            $meta->save();

            return response()->json(['Contact Info Updated']);
        }
        if ($request->contact_type == 'phone') {
            $validatedData = $request->validate([
                'phone' => 'required|min:10|max:15',
            ]);


            $data['contact_type'] = 'phone';
            $data['phone'] = $request->phone;

            $meta->content = json_encode($data);
            $meta->save();

            return response()->json(['Contact Info Updated']);
        }

        if ($request->contact_type == 'affiliate_button') {
            $validatedData = $request->validate([
                'url' => 'required|max:100',
            ]);

            $data['contact_type'] = 'affiliate_button';
            $data['url'] = $request->url;
            $meta->content = json_encode($data);
            $meta->save();

            return response()->json(['Contact Info Updated']);
        }






        if ($request->contact_type == 'affiliate_banner_ads') {
            $validatedData = $request->validate([
                'url' => 'required|max:100',
                'banner' => 'required|image|max:500',
            ]);

            $info = json_decode($meta->content);
            $file = $request->banner;
            $name = time() . time() . '.' . $file->getClientOriginalExtension();
            $target_path = 'uploads/' . date('y/m/');
            $file->move($target_path, $name);

            $file_name = $target_path . '/' . $name;
            if (!empty($info->contact_type == 'affiliate_banner_ads')) {
                if (!empty($info->file)) {
                    if (file_exists($info->file)) {
                        unlink($info->file);
                    }
                }
            }



            $data['contact_type'] = 'affiliate_banner_ads';
            $data['url'] = $request->url;
            $data['file'] = $file_name;
            $meta->content = json_encode($data);
            $meta->save();

            return response()->json(['Contact Info Updated']);
        }
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'city' => 'required',
            'min_price' => 'required|max:100',
            'max_price' => 'required|max:100',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'max:500',

        ]);

        $term = Terms::where('user_id', Auth::id())->findorFail($id);
        $term->title = $request->name;
        $term->save();

        $min_price =  Price::where([
            ['type', 'min_price'],
            ['term_id', $id]
        ])->first();

        $min_price->price = $request->min_price;
        $min_price->save();

        $max_price =  Price::where([
            ['type', 'max_price'],
            ['term_id', $id]
        ])->first();

        $max_price->price = $request->max_price;
        $max_price->save();



        $excerpt = Meta::where('term_id', $id)->where('type', 'excerpt')->first();
        if (empty($excerpt)) {
            $excerpt = new Meta;
            $excerpt->term_id = $id;
            $excerpt->key = 'excerpt';
        }
        $excerpt->content = $request->excerpt;
        $excerpt->save();



        if ($request->youtube_url) {
            $ytb = Meta::where('term_id', $id)->where('type', 'youtube_url')->first();
            if (empty($ytb)) {
                $ytb = new Meta;
                $ytb->term_id = $id;
                $ytb->type = 'youtube_url';
            }
            $ytb->content = $this->parse_yotube_url($request->youtube_url);
            $ytb->save();
        } else {
            $ytb = Meta::where('term_id', $id)->where('type', 'youtube_url')->delete();
        }

        if ($request->virtual_tour) {
            $virtual_tour = Meta::where([
                ['term_id', $id],
                ['type', 'virtual_tour']
            ])->first();

            if (empty($virtual_tour)) {
                $virtual_tour = new Meta;
                $virtual_tour->term_id = $id;
                $virtual_tour->type = 'virtual_tour';
            }
            $virtual_tour->content = $request->virtual_tour;
            $virtual_tour->save();
        } else {
            $virtual_tour = Meta::where([
                ['term_id', $id],
                ['type', 'virtual_tour']
            ])->delete();
        }


        $contents = Meta::where('term_id', $id)->where('type', 'content')->first();
        if (empty($contents)) {
            $contents = new Meta;
            $contents->term_id = $id;
            $contents->type = 'content';
        }
        $contents->content = $request->contents;
        $contents->save();



        $city = Postcategoryoption::where('term_id', $id)->where('category_id', $request->city)->where('type', 'city')->first();
        if (empty($city)) {
            $city = new Postcategoryoption;
            $city->category_id = $request->city;
            $city->term_id = $id;
            $city->type = 'city';
        }
        $city->value = $request->location;
        $city->save();

        $latitude = Postcategoryoption::where('term_id', $id)->where('category_id', $request->city)->where('type', 'latitude')->first();
        if (empty($latitude)) {
            $latitude = new Postcategoryoption;
            $latitude->category_id = $request->city;
            $latitude->term_id = $id;
            $latitude->type = 'latitude';
        }

        $latitude->value = $request->latitude;
        $latitude->save();

        $longitude = Postcategoryoption::where('term_id', $id)->where('category_id', $request->city)->where('type', 'longitude')->first();
        if (empty($longitude)) {
            $longitude = new Postcategoryoption;
            $longitude->category_id = $request->city;
            $longitude->term_id = $id;
            $longitude->type = 'longitude';
        }

        $longitude->value = $request->longitude;
        $longitude->save();

        $options = [];
        foreach ($request->input_option ?? [] as $key => $value) {
            if (!empty($value)) {
                $data['term_id'] = $id;
                $data['category_id'] = $request->input_id[$key];
                $data['type'] = 'options';
                $data['value'] = $value;
                array_push($options, $data);
            }
        }
        // Postcategoryoption::insert($options);
        foreach ($request->facilities ?? [] as $key => $value) {
            if (!empty($request->facilities_input[$key])) {
                $data['term_id'] = $id;
                $data['category_id'] = $value;
                $data['type'] = 'facilities';
                $data['value'] = $request->facilities_input[$key];

                array_push($options, $data);
            }
        }

        Postcategoryoption::where('type', 'options')->where('term_id', $id)->delete();
        Postcategoryoption::where('type', 'facilities')->where('term_id', $id)->delete();
        Postcategoryoption::insert($options);


        $category = [];
        foreach ($request->category ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id'] = $id;
                $post_cat['category_id'] = $value;
                $post_cat['type'] = 'category';
                array_push($category, $post_cat);
            }
        }

        foreach ($request->features ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id'] = $id;
                $post_cat['category_id'] = $value;
                $post_cat['type'] = 'features';
                array_push($category, $post_cat);
            }
        }

        foreach ($request->status ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id'] = $id;
                $post_cat['category_id'] = $value;
                $post_cat['type'] = 'status';
                array_push($category, $post_cat);
            }
        }


        foreach ($request->state ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id'] = $id;
                $post_cat['category_id'] = $value;
                $post_cat['type'] = 'state';
                array_push($category, $post_cat);
            }
        }

        Termrelation::where(['term_id' => $id])->delete();
        if (!empty($request->project)) {

            Termrelation::insert(['term_id' => $term->id, 'child_id' => $request->project]);
        }

        Postcategory::where('term_id', $id)->where('type', '!=', 'category')->delete();
        Postcategory::insert($category);

        return redirect()->back()->with('message', 'Property Updated Successfully');
    }

    public function floor_plan_store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'square_ft' => 'required|max:50',
            'file' => 'required|image|max:1000',
        ]);
        $term = Terms::where('user_id', Auth::id())->findorFail($id);

        if ($file = $request->file('file')) {

            $name = time() . time() . '.' . $file->getClientOriginalExtension();

            $target_path = 'uploads/' . date('y/m/');

            $file->move($target_path, $name);
            $data['file_name'] = $target_path . $name;
            $data['name'] = $request->name;
            $data['square_ft'] = $request->square_ft;
            $post = new Meta;
            $post->type = 'floor_plan';
            $post->term_id = $id;
            $post->content = json_encode($data);
            $post->save();
            \Session::flash('message', 'Floor Plan Added Successfully');
            return back();
        }
    }


    public function floor_plan_delete($id)
    {
        $meta = Meta::with('term')->findorFail($id);
        if (Auth::id() == $meta->term->user_id) {
            $data = json_decode($meta->content);
            if (file_exists($data->file_name)) {
                unlink($data->file_name);
            }

            $meta->delete();
        }
        \Session::flash('message', 'Floor Plan Deleted Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $term = Terms::where('user_id', Auth::id())->with('medias', 'floor_plans')->findorFail($id);

        $ids = [];

        foreach ($term->medias as $key => $row) {
            array_push($ids, $row->id);
        }

        if (count($ids) > 0) {
            \App\Http\Controllers\Admin\MediaController::post_media_destroy($ids);
        }

        foreach ($term->floor_plans as $key => $row) {
            $data = json_decode($row->content);
            if (file_exists($data->file_name)) {
                unlink($data->file_name);
            }
        }
        $term->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }


    public function parse_yotube_url($url)
    {
        $pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
        $pattern .= '(?:www\.)?';         #  Optional www subdomain.
        $pattern .= '(?:';                #  Group host alternatives:
        $pattern .=   'youtu\.be/';       #    Either youtu.be,
        $pattern .=   '|youtube\.com';    #    or youtube.com
        $pattern .=   '(?:';              #    Group path alternatives:
        $pattern .=     '/embed/';        #      Either /embed/,
        $pattern .=     '|/v/';           #      or /v/,
        $pattern .=     '|/watch\?v=';    #      or /watch?v=,
        $pattern .=     '|/watch\?.+&v='; #      or /watch?other_param&v=
        $pattern .=   ')';                #    End path alternatives.
        $pattern .= ')';                  #  End host alternatives.
        $pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
        $pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.
        preg_match($pattern, $url, $matches);
        return (isset($matches[1])) ? $matches[1] : false;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_property($id = null)
    {
        $categories = Category::where('type', 'category')->get();
        //new design khiaratee
        $status_category = Category::where('type', 'status')->where('featured', 1)->get();
        //for edit
        $post_data = '';
        if (isset($id)) {
            $post_data = Terms::with('arabic_description','description', 'area', 'city', 'property_status_type')->where('user_id', Auth::id())->findorFail($id);
        }
        return view('theme::newlayouts.property_dashboard.property_create', compact('categories', 'status_category', 'id', 'post_data'));
    }

    /**
     * Store a newly created property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_property(Request $request)
    {

        $validator = $this->property_create_validations($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $slug = Str::slug($request->title);
        $count = Terms::where('type', 'property')->where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . rand(40, 60) . $count;
        }

        //store & update title and slug
        $term = Terms::where('user_id', Auth::id())->where('id', $request->term_id)->first();
        $unique_id=generate_unique_id($term,'5');
   
        if (empty($term)) {
            $term = new Terms;
            $term->user_id = Auth::id();
            $term->unique_id =  $unique_id;
            $term->status = 3;
            $term->type = 'property';
            $term->slug = $slug;
        }
        $term->title = $request->title;
        $term->ar_title = $request->ar_title;
        $term->save();

        //store and update description
        $description = Meta::where('term_id', $term->id)->where('type', 'description')->first();
        if (empty($description)) {
            $description = new Meta;
            $description->term_id = $term->id;
            $description->type = 'description';
        }
        $description->content = $request->description;
        $description->save();

        //store arabic description
        $ar_description = Meta::where('term_id', $term->id)->where('type', 'arabic_description')->first();
        if (empty($ar_description)) {
            $ar_description = new Meta;
            $ar_description->term_id = $term->id;
            $ar_description->type = 'arabic_description';
        }
        $ar_description->content = $request->ar_description;
        $ar_description->save();

        //store & update contact type
        $json['contact_type'] = "mail";
        $json['email'] = Auth::user()->email;
        $contact = Meta::where('term_id', $term->id)->where('type', 'contact_type')->first();
        if (empty($contact)) {
            $contact = new Meta;
            $contact->term_id = $term->id;
            $contact->type = 'contact_type';
        }
        $contact->content = json_encode($json);
        $contact->save();

        //store & update property area
        $area = Meta::where('term_id', $term->id)->where('type', 'area')->first();
        if (empty($area)) {
            $area = new Meta;
            $area->term_id = $term->id;
            $area->type = 'area';
        }
        $area->content = $request->area;
        $area->save();

        //store & update property city and location
        $city = Postcategoryoption::where('term_id', $term->id)->where('type', 'city')->first();
        if (empty($city)) {
            $city = new Postcategoryoption;
            $city->term_id = $term->id;
            $city->type = 'city';
        }
        $city->category_id = $request->city;
        $city->value = $request->location;
        $city->save();
        //property status create and update
        $post_cat['term_id'] = $term->id;
        $post_cat['category_id'] = $request->status;
        $post_cat['type'] = 'status';
        Postcategory::where('type', 'status')->where('term_id', $term->id)->delete();
        Postcategory::insert($post_cat);

        return redirect()->route('agent.property.second_edit_property', encrypt($term->id));
    }


    /**
     * Property validations.
     * @return @array
     */
    public function property_create_validations($request)
    {
        return  \Validator::make($request->all(), [
            'status' => 'required',
            'title' => 'required|max:100',
            'ar_title' => 'required|max:100',
            'description' => 'required|max:1000',
            'ar_description' => 'required|max:1000',
            'area' => 'required|numeric',
            'location' => 'required',
            'city' => 'required'
        ], [
            'status.required' => 'Please select property type',
            'title.required' => 'Please provide title of property',
            'title.max' => 'Property title must be 100 words',
            'ar_title.required' => 'Please provide arabic title of property',
            'ar_title.max' => 'Property arabic title must be 100 words',
            'description.required' => 'Please provide property description',
            'description.max' => 'Property description must be 1000 words',
            'ar_description.required' => 'Please provide property description in Arabic',
            'ar_description.max' => 'Property arabic description must be 1000 words',
            'area.required' => 'Please provide area',
            'area.numeric' => 'Area must be number',
            'location.required' => 'Please provide address',
            'city.required' => 'Please provide Region',

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_two_property($id)
    {
        $parent_category = Category::where('type', 'parent_category')->get();
        $child_category =  Category::where('type', 'category')->get();
        //for edit
        $post_data = Terms::with('price', 'electricity_facility', 'water_facility', 'streets', 'street_info_one', 'street_info_two', 'postcategory')->where('user_id', Auth::id())->where('id', decrypt($id))->first();
        $array = [];
        foreach ($post_data->postcategory as $key => $value) {
            if ($value->type == 'parent_category') {
                $array[$value->type] = $value->category_id;
            }
            if ($value->type == 'category') {
                $array[$value->type] = $value->category_id;
            }
        }
        return view('theme::newlayouts.property_dashboard.property_create_two', compact('id', 'parent_category', 'child_category', 'post_data', 'array'));
    }


    public function get_property_type(Request $request)
    {
        $data['post_category'] = Postcategory::where('type', 'category')->where('term_id', decrypt($request->term_id))->first();
        $data['category_data'] = Category::where('type', 'parent_category')->where('id', $request->id)->with('parent')->get();
        return $data;
    }

    /**
     * Property validations.
     * @return @array
     */
    public function property_two_validations($request)
    {
        return  \Validator::make($request->all(), [
            'parent_category' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'streets' => 'required',
        ], [
            'parent_category.required' => 'Please select property nature',
            'category.required' => 'Please select property type',
            'price.required' => 'Property price is required',
            'price.numeric' => 'Property price is only in digits',
            'streets.required' => 'Number of streets are required',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_two_property(Request $request, $id)
    {
//        dd($request->all());
        $term_id = decrypt($id);
        $validator = $this->property_two_validations($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //price store & update
        $price = Price::where('term_id', $term_id)->where('type', 'price')->first();
        if (empty($price)) {
            $price = new Price;
            $price->type = "price";
            $price->term_id = $term_id;
        }
        $price->price = $request->price;
        $price->save();

        //parent and child category of property nature and type store and update
        $category = [];
        if (!empty($request->parent_category)) {
            $post_cat['term_id'] = $term_id;
            $post_cat['category_id'] = $request->parent_category;
            $post_cat['type'] = 'parent_category';
            array_push($category, $post_cat);
        }


        if (!empty($request->category)) {
            $post_cat['term_id'] = $term_id;
            $post_cat['category_id'] = $request->category;
            $post_cat['type'] = 'category';
            array_push($category, $post_cat);
        }
        Postcategory::where('type', 'parent_category')->where('term_id', $term_id)->delete();
        Postcategory::where('type', 'category')->where('term_id', $term_id)->delete();
        Postcategory::insert($category);



        //street info ,slectricity and water flag store and update
        $data = $request->all();
        unset($data['_token'], $data['_method'], $data['parent_category'], $data['category'], $data['price'],$data['landsize'],$data['builtarea'],$data['ready'],$data['property-age'],$data['meter'],$data['interface']);
        foreach ($data as $key => $value) {
            $keys_table = '';
            $keys_table = Meta::where('term_id', $term_id)->where('type', $key)->first();
            if (empty($keys_table)) {
                $keys_table = new Meta;
                $keys_table->term_id = $term_id;
                $keys_table->type = $key;
            }
            $keys_table->content = $value;
            $keys_table->save();
        }
        $check_category = Category::where('type', 'category')->where('id', $request->category)->first();
        //if land then skip third step for facilities
        
        if (!empty($check_category) && Str::contains($check_category->name, 'land') ) {
            return redirect()->route('agent.property.forth_edit_property', encrypt($term_id));
        }
        return redirect()->route('agent.property.third_edit_property', encrypt($term_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_third_property($id)
    {
        $this->term_id = decrypt($id);
        $array = [];
        $property_type = null;
        $info = Terms::with('postcategory')->where('user_id', Auth::id())->findorFail($this->term_id);
        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
            if ($value->type == 'category') {
                $this->property_type = $value->category_id;
            }
        }

        $input_options = Category::where('type', 'option')->whereHas('child', function ($q) {
            return $q->where('id', $this->property_type);
        })->with(['post_category_option' => function ($q) {
            return $q->where('term_id', $this->term_id);
        }])->get();

        //edit data
        $post_data = Terms::with('role', 'property_condition')->where('user_id', Auth::id())->where('id',  $this->term_id)->first();
        return view('theme::newlayouts.property_dashboard.property_create_third', compact('id', 'input_options', 'post_data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_third_property(Request $request, $id)
    {
        $term_id = decrypt($id);
        //store number of features
        $options = [];
        foreach ($request->input_option ?? [] as $key => $value) {
            if (!empty($value)) {
                $data['term_id'] = $term_id;
                $data['category_id'] = $value;
                $data['type'] = 'options';
                $data['value'] =  $request[$key];
                array_push($options, $data);
            }
        }
        Postcategoryoption::where('type', 'options')->where('term_id', $term_id)->delete();
        Postcategoryoption::insert($options);


        //property condition store & update
        $meta = Meta::where('term_id', $term_id)->where('type', 'property_condition')->first();
        if (empty($meta)) {
            $meta = new Meta;
            $meta->term_id = $term_id;
            $meta->type =  'property_condition';
        }
        $meta->content = $request['furnishing'];
        $meta->save();

        //property condition store & update
        $meta_role = Meta::where('term_id', $term_id)->where('type', 'role')->first();
        if (empty($meta_role)) {
            $meta_role = new Meta;
            $meta_role->term_id = $term_id;
            $meta_role->type =  'role';
        }
        $meta_role->content = $request['role'];
        $meta_role->save();


        return redirect()->route('agent.property.forth_edit_property', encrypt($term_id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_forth_property($id)
    {
        $info = Terms::with('medias', 'virtual_tour', 'postcategory')->where('user_id', Auth::id())->findorFail(decrypt($id));
        $check_category = Meta::where('type', 'property_condition')->where('term_id', decrypt($id))->first();
        $skip_id = '';
        if (empty($check_category)) {
            $skip_id = 1;
        }
        return view('theme::newlayouts.property_dashboard.property_create_forth', compact('id', 'info', 'skip_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_forth_property(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'media.*' => 'mimes:jpeg,jpg,png|max:20480',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $term_id = decrypt($id);
        //store and update virtual rour video
        $virtual_tour = Meta::where('term_id', $term_id)->where('type', 'virtual_tour')->first();
        if (empty($virtual_tour)) {
            $virtual_tour = new Meta;
            $virtual_tour->term_id = $term_id;
            $virtual_tour->type = 'virtual_tour';
        }
        $virtual_tour->content = $request->virtual_tour;
        $virtual_tour->save();


        unset($request['_token'], $request['virtual_tour']);
        //store images
        $this->upload_images($request);
        return redirect()->route('agent.property.five_edit_property', encrypt($term_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_five_property($id)
    {
        $term_id = decrypt($id);
        $info = Terms::with('postcategory')->where('user_id', Auth::id())->findorFail($term_id);
        $features_array = [];
        foreach ($info->postcategory as $key => $value) {
            array_push($features_array, $value->category_id);
        }
        return view('theme::newlayouts.property_dashboard.property_create_five', compact('id', 'features_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_five_property(Request $request, $id)
    {
        $term_id = decrypt($id);
        $category = [];
        foreach ($request->features ?? [] as $key => $value) {
            if (!empty($value)) {
                $post_cat['term_id'] = $term_id;
                $post_cat['category_id'] = $value;
                $post_cat['type'] = 'features';
                array_push($category, $post_cat);
            }
        }
        Postcategory::where('type', 'features')->where('term_id', $term_id)->delete();
        Postcategory::insert($category);
        return redirect()->route('agent.property.six_edit_property', encrypt($term_id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_six_property($id)
    {
        $term_id = decrypt($id);
        $post_data = Terms::with('id_number', 'instrument_number')->where('user_id', Auth::id())->findorFail($term_id);
        return view('theme::newlayouts.property_dashboard.property_create_six', compact('id', 'post_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_six_property(Request $request, $id)
    {

        $term_id = decrypt($id);
        $data = $request->all();
        unset($data['_token'], $data['_method']);
        foreach ($data as $key => $value) {
            $keys_table = '';
            $keys_table = Meta::where('term_id', $term_id)->where('type', $key)->first();
            if (empty($keys_table)) {
                $keys_table = new Meta;
                $keys_table->term_id = $term_id;
                $keys_table->type = $key;
            }
            $keys_table->content = $value;
            $keys_table->save();
        }
        return redirect()->route('agent.property.finish_property', encrypt($term_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finish_property($id)
    {

        return view('theme::newlayouts.property_dashboard.finish', compact('id'));
    }

    public function upload_images($request)
    {

        request()->validate([
            'media.*' => 'required'

        ]);

        $auth_id = Auth::id();


        $info = Options::where('key', 'lp_filesystem')->first();
        $info = json_decode($info->value);


        $imageSizes = json_decode(imageSizes());

        if ($request->hasfile('media')) {
            foreach ($request->file('media') as $image) {

                $name = uniqid() . date('dmy') . time() . "." . $image->getClientOriginalExtension();
                $ext = $image->getClientOriginalExtension();



                $this->fullname = date('dmy') . time() . uniqid() . '.' . $image->getClientOriginalExtension();

                $path = 'uploads/' . date('y') . '/' . date('m') . '/';


                if (substr($image->getMimeType(), 0, 5) == 'image' &&  $ext != 'ico') {

                    $image->move($path, $name);
                    $compress = $this->run($path . $name, $ext, $info->compress);

                    if (file_exists($path . $name)) {
                        if (!in_array(strtolower($ext), array('png', 'gif'))) {

                            unlink($path . $name);
                        }
                    }

                    if ($info->system_type == 'do') {
                        $file = asset($compress['data']['image']);

                        $upload = Storage::disk('do')->putFileAs(date('Ym'), $file, $compress['data']['name'], 'public');

                        $fileUrl = $info->system_url . '/' . $upload;


                        $newpath = date('Ym');
                        $filename = $compress['data']['name'];


                        $imgArr = explode('.', $compress['data']['name']);



                        foreach ($imageSizes as $size) {
                            $img = Image::make($compress['data']['image']);
                            $img->fit($size->width, $size->height);
                            $moved = $img->save('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1]);

                            $resizeIMG = asset('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1]);

                            Storage::disk('do')->putFileAs(date('Ym'), $resizeIMG, $imgArr[0] . $size->key . '.' . $imgArr[1], 'public');
                            if (file_exists('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1])) {
                                unlink('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1]);
                            }
                        }

                        if (file_exists($compress['data']['image'])) {
                            unlink($compress['data']['image']);
                        }
                    } else {
                        $schemeurl = parse_url(url('/'));
                        if ($schemeurl['scheme'] == 'https') {
                            $url = substr(url('/'), 6);
                        } else {
                            $url = substr(url('/'), 5);
                        }

                        $fileUrl = $url . '/' . $compress['data']['image'];
                        $newpath = $path;
                        $filename = $compress['data']['image'];
                        $imgArr = explode('.', $compress['data']['image']);
                        if (file_exists($compress['data']['image'])) {
                            foreach ($imageSizes as $size) {

                                $img = Image::make($compress['data']['image']);
                                $img->fit($size->width, $size->height);

                                $img->save($imgArr[0] . $size->key . '.' . $imgArr[1]);
                            }
                        }
                    }

                    $media = new Media;
                    $media->name = $filename;
                    $media->url = $fileUrl;
                    $media->type = $ext;
                    $media->path = $newpath;
                    $media->user_id = $auth_id;
                    $media->size = $compress['data']['size'] . 'kib';
                    $media->save();
                    $data = $media;
                } else {
                    request()->validate([
                        'media.*' => 'required||mimes:doc,docx,txt,pdf,xlsx,ico|max:2024'

                    ]);
                    if ($info->system_type == 'do') {
                        $file = uniqid() . $image;
                        $upload = Storage::disk('do')->putFileAs(date('Ym'), $file, $name, 'public');
                        $fileUrl = $info->system_url . date('Ym') . '/' . $upload;
                        $newpath = date('Ym');
                    } else {
                        $name = uniqid() . time() . "." . $image->getClientOriginalExtension();
                        $ext = $image->getClientOriginalExtension();
                        $path = 'uploads/' . date('y') . '/' . date('m') . '/';
                        $image->move($path, $name);

                        $schemeurl = parse_url(url('/'));
                        if ($schemeurl['scheme'] == 'https') {
                            $url = substr(url('/'), 6);
                        } else {
                            $url = substr(url('/'), 5);
                        }
                        $fileUrl = $url . '/' . $path . $name;
                        $newpath = $path;
                    }

                    $media = new Media;
                    $media->name = $fileUrl;
                    $media->url = $fileUrl;
                    $media->type = $ext;
                    $media->size = 'unknown';
                    $media->path = $newpath;
                    $media->user_id = $auth_id;
                    $media->save();
                    $data = $media;
                }
                if ($request->term_id) {
                    $mediapost = new Mediapost;
                    $mediapost->term_id = $request->term_id;
                    $mediapost->media_id = $data->id;
                    $mediapost->save();
                }
            }


            return response($data);
        }
    }

    function run($image, $c_type, $level = 0)
    {

        // get file info
        $im_info = getImageSize($image);
        $im_name = basename($image);
        $im_type = $im_info['mime'];
        $im_size = filesize($image);

        // result
        $result = array();

        // cek & ricek
        if (in_array($c_type, array('jpeg', 'jpg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'))) { // jpeg, png, gif only
            $result['data'] = $this->create_image($image, $im_name, $im_type, $im_size, $c_type, $level);

            if ($c_type == 'gif' || $c_type == 'png') {
                if (file_exists($image)) {
                    unlink($image);
                }
            }
            return $result;
        }
    }



    private function create_image($image, $name, $type, $size, $c_type, $level)
    {
        $im_name = $this->fullname;
        $path = 'uploads/' . date('y') . '/' . date('m') . '/';
        $im_output = $path . $im_name;
        $im_ex = explode('.', $im_output); // get file extension

        // create image
        if ($type == 'image/jpeg') {
            $im = imagecreatefromjpeg($image); // create image from jpeg

        } elseif ($type == 'image/png') {
            $im = imagecreatefrompng($image);
        } elseif ($type == 'image/gif') {
            $im = imagecreatefromgif($image);
        }

        // compree image
        if ($c_type) {
            $im_name = str_replace(end($im_ex), $c_type, $im_name); // replace file extension
            if ($c_type != 'gif') {
                $im_output = str_replace(end($im_ex), 'webp', $im_output); // replace file extension
                if (!empty($level)) {
                    imagewebp($im, $im_output, 100 - ($level * 10)); // if level = 2 then quality = 80%
                } else {
                    imagewebp($im, $im_output, 100); // default quality = 100% (no compression)
                }
                $im_type = 'image/webp';
                // image destroy
                imagedestroy($im);
            } else {

                if (!empty($level)) {
                    imagegif($im, $im_output, 100 - ($level * 10));
                } else {
                    imagegif($im, $im_output, 100 - ($level * 10));
                }
                $im_type = $type;
                // image destroy
                imagedestroy($im);
            }

            $im_output = str_replace(end($im_ex), $c_type, $im_output); // replace file extension



        } else {
        }



        // output original image & compressed image
        $im_size = filesize($im_output);
        $info = array(
            'name' => $im_name,
            'image' => $im_output,
            'type' => $im_type,
            'size' => $im_size
        );
        return $info;
    }

    public function property_list()
    {

        return view('theme::newlayouts.user_dashboard.property_list');
    }

    public function get_user_properties(Request $request)
    {

        $this->state = $request->state;
        $this->status = $request->status;
        $this->category = $request->category;
        $this->price = $request->price;
        // $this->max_price = $request->max_price;

        $this->badroom = $request->badroom[16] ?? null;
        $this->bathroom = $request->bathroom[17] ?? null;
        $this->floor = $request->floor[18] ?? null;
        $this->block = $request->block[15] ?? null;

        $posts = Terms::where('type', 'property')->where('status', 1)->where('user_id', Auth::id())->whereHas('price')->whereHas('post_city')->with('area', 'post_preview', 'price', 'post_city', 'user', 'option_data', 'property_status_type')->whereHas('post_city', function ($q) {
            if (!empty($this->state)) {
                return $q->where('category_id', $this->state);
            }
            return $q;
        })->whereHas('property_status_type', function ($q) {
            if (!empty($this->status)) {
                return $q->where('category_id', $this->status);
            }
            return $q;
        });

        if (!empty($request->category)) {
            $posts = $posts->whereHas('category', function ($q) {
                return $q->where('category_id', $this->category);
            });
        }

        if (!empty($request->price)) {
            $posts = $posts->whereHas('price', function ($q) {
                return $q->where('price', '=', $this->price);
            });
        }

        if (!empty($request->src)) {
            $posts = $posts->where('title', 'LIKE', '%' . $request->src . '%');
        }


        if (!empty($this->block) && !empty($this->badroom) && !empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 16);
                return $data->where('value', '>=', $this->badroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 17);
                    return $data->where('value', '>=', $this->bathroom);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 15);
                    return $data->where('value', '>=', $this->block);
                })

                ->latest()->paginate(30);

            return response()->json($data);
        }
        if (!empty($this->badroom) && !empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 16);
                return $data->where('value', '>=', $this->badroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 17);
                    return $data->where('value', '>=', $this->bathroom);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })

                ->latest()->paginate(30);


            return response()->json($data);
        }
        if (!empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 17);
                return $data->where('value', '>=', $this->bathroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })
                ->latest()->paginate(30);
            return response()->json($data);
        }
        if (!empty($bathroom)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 17);
                return $data->where('value', '>=', $this->bathroom);
            })
                ->latest()->paginate(30);


            return response()->json($data);
        }

        if (!empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 18);
                return $data->where('value', '>=', $this->floor);
            })
                ->latest()->paginate(30);

            return response()->json($data);
        }

        if (!empty($this->block)) {
            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 15);
                return $data->where('value', '>=', $this->block);
            })
                ->latest()->paginate(30);

            return response()->json($data);
        }

        $posts = $posts->latest()->paginate(30);
        return response()->json($posts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_property($id)
    {
        $data = ['messages' => 'Property not found', 'status' => 'error'];
        $term = Terms::where('user_id', Auth::id())->findorFail($id);
        if (!empty($term)) {
            $term = Terms::where('user_id', Auth::id())->where('id', $id)->update(['status' => 0]);
            $data = ['messages' => 'Property deleted successfully', 'status' => 'success'];
        }
        return response()->json($data);
    }


    public function delete_account($id)
    {


        $data = ['messages' => 'Admin can not delete your account', 'status' => 'error'];

        if($id != 1)
        {
            User::where('id', $id)->update(['status' => 0]);
            Auth::logout();
            $data = ['messages' => 'Account deleted successfully', 'status' => 'success'];
        }

        return response()->json($data);
    }

    public function userboard_account()
    {
        return view('theme::newlayouts.user_dashboard.account');
    }
}
