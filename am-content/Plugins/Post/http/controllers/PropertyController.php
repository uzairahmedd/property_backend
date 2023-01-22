<?php

namespace Amcoders\Plugin\Post\http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Terms;
use App\Meta;
use App\Category;
use App\Postcategory;
use App\Models\Postcategoryoption;
use App\Models\User;
use App\Models\Termrelation;
use App\Models\Price;
use Illuminate\Support\Facades\DB;
use Str;
use Session;

class PropertyController extends controller
{
    protected $term_id;
    protected $property_type;
    public $email;
    public $name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type = "all")
    {

        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }
        if ($request->src && $request->type == 'email') {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->whereHas('user', function ($q) {
                return $q->where('email', $this->email);
            })->latest()->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where($request->type, 'LIKE', '%' . $request->src . '%')->latest()->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->latest()->paginate(40);
        }
        $totals = Terms::where('type', 'property')->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
        ])->count();
        return view('plugin::properties.index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('Properties.create')) {
            abort(401);
        }

        $categories = Category::where('type', 'category')->get();
        $parent_category = Category::where('type', 'parent_category')->get();
        //new design khiaratee
        $status_category = Category::where('type', 'status')->where('featured', 1)->get();
        //feature
        $feature = Category::where('type', 'feature')->get();
        return view('plugin::properties.create', compact('categories', 'status_category', 'parent_category', 'feature'));
    }

    public function property_type($id)
    {

        $data['category_data'] = Category::where('type', 'parent_category')->where('id', $id)->with('parent')->get();
        return response()->json($data);
    }


    public function findUser(Request $request)
    {

        $user = User::where('role_id', 2)->where('email', $request->email)->first();
        if (empty($user)) {
            $data['errors']['user'] = 'User Not Found';
            return response()->json($data, 401);
        }
        return response()->json($user);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function old_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
            'user_id' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
        ]);

        $slug = Str::slug($request->title);
        $count = Terms::where('type', 'property')->where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . rand(40, 60) . $count;
        }

        $term = new Terms;
        $term->title = $request->title;
        $term->slug = $slug;
        $term->user_id = $request->user_id;
        $term->status = 2;
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


        $cat = PostCategory::insert(['term_id' => $term->id, 'category_id' => $request->type]);
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Project Created Successfully"
        ]);

        return redirect()->route('admin.property.edit', $term->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }

        if ($request->src && $request->type == 'email') {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->whereHas('user', function ($q) {
                return $q->where('email', $this->email);
            })->where('status', $id)->latest()->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where('status', $id)->where($request->type, 'LIKE', '%' . $request->src . '%')->latest()->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->where('status', $id)->latest()->paginate(40);
        }
        $totals = Terms::where('type', 'property')->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
        ])->count();

        $type = $id;
        return view('plugin::properties.index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function old_edit($id)
    {
        if (!Auth()->user()->can('Properties.edit')) {
            abort(401);
        }

        $this->term_id = $id;
        $info = Terms::with('excerpt', 'content', 'postcategory', 'latitude', 'longitude', 'city', 'medias', 'facilities', 'options', 'child')->find($id);
        $input_options = \App\Category::where('type', 'option')->with(['post_category_option' => function ($q) {
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


        // foreach ($info->facilities as $key => $row) {
        //     array_push($array, $row->category_id);
        // }

        $input_options = \App\Category::where('type', 'option')->whereHas('child', function ($q) {
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

        $facilities = \App\Category::where('type', 'facilities')->get();

        $child = $info->child->child_id ?? null;
        return view('plugin::properties.edit', compact('info', 'input_options', 'array', 'facilities', 'child'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('Properties.edit')) {
            abort(401);
        }
        $this->term_id = $id;
        $info = Terms::where('id', $id)->with('id_number', 'instrument_number', 'virtual_tour', 'post_preview', 'streets', 'price', 'area', 'electricity_facility', 'water_facility', 'post_city', 'user', 'multiple_images', 'option_data', 'property_status_type', 'postcategory', 'property_condition')->first();
        $status_category = Category::where('type', 'status')->where('featured', 1)->get();
        $parent_category = Category::where('type', 'parent_category')->get();
        $child_category =  Category::where('type', 'category')->get();
        $array = [];
        $property_type = null;
        foreach ($info->postcategory as $key => $value) {
            if ($value->type == 'parent_category') {
                $array[$value->type] = $value->category_id;
            }
            if ($value->type == 'category') {
                $array[$value->type] = $value->category_id;
                $this->property_type = $value->category_id;
            }
        }

        $input_options = \App\Category::where('type', 'option')->whereHas('child', function ($q) {
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


        $features_array = [];
        foreach ($info->postcategory as $key => $value) {
            array_push($features_array, $value->category_id);
        }

        return view('plugin::properties.edit', compact('info', 'array', 'status_category', 'parent_category', 'child_category', 'features_array', 'input_options'));
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

        // $validatedData = $request->validate([
        //     'title' => 'required|max:100',

        //     // 'description' => 'max:500',


        // ]);


        $term = Terms::find($id);
        // $term->title = $request->title;
        $term->status = $request->moderation_status;
        $term->featured = $request->featured;
        $term->save();


        return response()->json(['Property Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('Properties.delete')) {
            abort(401);
        }

        if ($request->method == 'delete') {
            if ($request->ids) {
                foreach ($request->ids as $id) {
                    Terms::destroy($id);
                }
            }
        } elseif (!empty($request->method)) {
            if ($request->ids) {
                if ($request->method == "trash") {
                    $method = 0;
                } else {
                    $method = $request->method;
                }

                foreach ($request->ids as $id) {
                    $term = Terms::find($id);
                    $term->status = $method;
                    $term->save();
                }
            }
        }

        return response()->json(['Success']);
    }

    public function csv_page(Request $request, $type = "all")
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }

        if ($request->src && ($request->type == 'email')) {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('email', $this->email);
                })->latest()->paginate(25);
        } elseif ($request->src && ($request->type == 'name')) {
            $this->name = $request->src;
            $posts = Terms::where('type', 'property')->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('name', $this->name);
                })->latest()->paginate(25);
        } else {
            $posts = Terms::where('type', 'property')->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')->latest()->paginate(25);
        }
        $totals = Terms::where('type', 'property')->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
        ])->count();
        return view('plugin::properties.csv_page', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /* Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show_csv_specified(Request $request, $id)
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }

        if ($request->src && ($request->type == 'email')) {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('email', $this->email);
                })->latest()->paginate(25);
        } elseif ($request->src && ($request->type == 'name')) {
            $this->name = $request->src;
            $posts = Terms::where('type', 'property')->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('name', $this->name);
                })->latest()->paginate(25);
        } else {
            $posts = Terms::where('type', 'property')->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')->latest()->paginate(25);
        }
        $totals = Terms::where('type', 'property')->where('status', $id)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
        ])->count();
        $type = $id;
        return view('plugin::properties.csv_page', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    // public function get_user_id($id)
    // {
    //     $user_id = DB::table('user_credentials')->where('user_id', $id)->first();
    //     return $user_id;
    // }

    //display modal box specif id data of property
    public function get_property_data($id)
    {
        $posts = Terms::where('type', 'property')->where('id', $id)
            ->with('rules', 'parentcategory', 'depth', 'length', 'property_age', 'meter', 'property_floor', 'post_new_city', 'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'post_district', 'user', 'option_data', 'property_status_type', 'postcategory', 'property_condition')
            ->first();
        $final_data = $this->property_data_making($posts);

        return response()->json($final_data);
    }

    public function property_data_making($posts)
    {
        return [
            'Ad_Id' => $posts->unique_id,
            'Advertiser_character' => $this->advertiser_character($posts),
            'Advertiser_name' => $posts->user->name,
            "Advertiser_mobile_number" => $posts->user->phone,
            "The_main_type_of_ad" => 'Offer',
            "Ad_description" => $this->add_descruption($posts),
            "Ad_subtype" => !empty($posts->property_status_type) ? $posts->property_status_type->category->name : 'N/A',
            "Advertisement_publication_date" => date('d-m-Y', strtotime($posts->created_at)),
            "Ad_update_date" =>  'N/A', //date('d-m-Y', strtotime($posts->updated_at)),
            "Ad_expiration" => date('d-m-Y', strtotime($posts->created_at->addMonths(3))),
            "Ad_status" => $this->get_status($posts->status),
            "Ad_Views" => $posts->count,
            "District_Name" => !empty($posts->post_district) ? $posts->post_district->district->name : 'N/A',
            'City_Name' => !empty($posts->post_new_city) ? $posts->post_new_city->city->name : 'N/A',
            'Neighbourhood_Name' => !empty($posts->post_district) ? $posts->post_district->district->name : 'N/A',
            'Street_Name' => 'N/A',
            'Longitude' => 'N/A',
            "Lattitude" => 'N/A',
            'Furnished' => $this->get_property_condition($posts->property_condition),
            'Kitchen' => $this->get_features_type($posts, 'Kitchen'),
            'Air_Condition' => $this->get_features_type($posts, 'Air Conditioned'),
            'facilities' => $this->get_features($posts),
            "Using_For" => !empty($posts->parentcategory) ? Category::where('id', $posts->parentcategory->category_id)->first('name')->name : 'N/A',
            'Property_Type' => !empty($posts->property_type) ? $posts->property_type->category->name : 'N/A',
            'The_Space' => (!empty($posts->builtarea) ? "Built-up area in SQM: " . $posts->builtarea->content . ',' : ' ') . ' ' . (!empty($posts->landarea) ?  "Land area in SQM: " . $posts->landarea->content : 'N/A'),
            'Land_Number' =>  'N/A',
            "Plan_Number" =>  'N/A',
            'Number_Of_Units' =>  'N/A',
            'Floor_Number' => !empty($posts->property_floor) && !empty($posts->property_floor->content) ? $posts->property_floor->content : 'N/A',
            'Unit_Number' => 'N/A',
            "Rooms_Number" => $this->get_option_number($posts, 'Bedrooms'),
            "Rooms_Type" => $this->get_rooms_type($posts),
            'Real_Estate_Facade' => 'N/A',
            'Street_Width' => $this->get_street_widths($posts),
            "Construction_Date" => !empty($posts->property_age) ? $posts->property_age->content : 'N/A',
            "Rental_Price" => !empty($posts->property_status_type) && $posts->property_status_type->category->name == "Rent" ? $posts->price->price . ' SAR' : 'N/A',
            'Selling_Price' => !empty($posts->property_status_type) && $posts->property_status_type->category->name == "Sale" ? $posts->price->price . ' SAR' : 'N/A',
            'Selling_Meter_Price' => 'N/A',
            "Property limits and lenghts" => (!empty($posts->length) && !empty($posts->length->content) ? 'length in SQM: ' . $posts->length->content . ',' : ' ') . ' ' . (!empty($posts->depth) && !empty($posts->depth->content) ? "Width in SQM" . $posts->depth->content : 'N/A'),
            "Is there a mortgage or restriction that prevents or limits the use of the property" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '1') ? '1' : '0'),
            "Rights and obligations over real estate that are not documented in the real estate document" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '2') ? '2' : '0'),
            "Information that may affect the property" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '3') ? '3' : '0'),
            "Property disputes" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '4') ? '4' : '0'),
            "Availability of elevators" => $this->get_features_type($posts, 'Elevator'),
            "Number of elevators" => $this->get_option_number($posts, 'Elevators'),
            "Availability of Parking" => $this->get_features_type($posts, 'Parking'),
            "Number of parking" => $this->get_option_number($posts, 'Parking'),
            "Advertiser category" => $this->advertiser_category($posts),
            "Advertiser license number" => !empty($posts->user->user_credentials) && !empty($posts->user->user_credentials->rega_number)  ? $posts->user->user_credentials->rega_number : 'N/A',
            "Advertiser's email" => $posts->user->email,
            "Advertiser registration number" => 'N/A',
            "Authorization number" => 'N/A',
        ];
    }

    public function get_street_widths($posts)
    {
        if (!empty($posts->meter) && !empty($posts->meter->content)) {
            $meters = explode(',', $posts->meter->content);
            $width_type = [];
            $count = 0;
            foreach ($meters as $value) {
                $count = $count + 1;
                array_push($width_type, 'street ' . $count . ', ' . $value . ' meter');
            }

            if (!empty($width_type)) {
                return implode(',', $width_type);
            } else {
                return 'N/A';
            }
        } else {
            return 'N/A';
        }
    }
    public function get_rule_type($rule_id)
    {

        if (!empty($rule_id != '0')) {
            return 'Yes';
        } else {
            return 'No';
        }
    }
    public function advertiser_category($posts)
    {

        if (!empty($posts->user->user_credentials)) {
            if ($posts->user->user_credentials->sub_account_type == '4') {
                return 'Individual Broker';
            } elseif ($posts->user->user_credentials->sub_account_type == '5') {
                return 'Company';
            } else {
                return 'N/A';
            }
        } else {
            return 'N/A';
        }
    }
    public function advertiser_character($posts)
    {

        if (!empty($posts->user->user_credentials)) {
            if ($posts->user->user_credentials->account_type == '1') {
                return 'Owner';
            } elseif ($posts->user->user_credentials->account_type == '2') {
                return 'Broker';
            } elseif ($posts->user->user_credentials->account_type == '3') {
                return 'Developer';
            }
        } else {
            return 'N/A';
        }
    }
    public  function get_rooms_type($posts)
    {
        $rooms_type = [];
        foreach ($posts->option_data as $key => $value) {

            if ($value->category->name != 'Parking' && $value->category->name != 'Elevators') {
                array_push($rooms_type, $value->category->name);
            }
        }

        if (!empty($rooms_type)) {
            return implode(',', $rooms_type);
        } else {
            return 'N/A';
        }
    }

    public  function get_option_number($posts, $type_name)
    {
        $no_rooms = '';
        foreach ($posts->option_data as $key => $value) {

            if ($value->category->name == $type_name) {
                $name = $value->category->name . ':' . $value->value;
                $no_rooms = $name;
            }
        }
        if (!empty($no_rooms)) {
            return $no_rooms;
        } else {
            return 'N/A';
        }
    }

    public  function get_features_type($data, $feature_name)
    {

        $category = Category::where('name', $feature_name)->first();
        $name = '';
        foreach ($data->postcategory as $key => $value) {

            if ($value->type == 'features' && !empty($category) && $value->category_id == $category->id) {

                $name = 1;
            }
        }
        if (!empty($name)) {
            return 'Yes';
        } else {
            return 'No';
        }
    }
    public  function get_features($data)
    {
        $features = [];
        foreach ($data->postcategory as $key => $value) {

            if ($value->type == 'features') {
                $name = Category::where([
                    ['id', $value->category_id]
                ])->first();
                array_push($features, $name->name);
            }
        }
        if (!empty($features)) {
            return implode(',', $features);
        } else {
            return 'N/A';
        }
    }
    public function add_descruption($posts)
    {
        $description = $posts->property_type->category->name . ' for ' . $posts->property_status_type->category->name . ' in, ' .
            $posts->post_district->district->name . ', ' .  $posts->post_new_city->city->name . '.';
        if (!empty($posts->landarea)) {
            $description .= $posts->property_type->category->name . " have land-area " . $posts->landarea->content . ' sqm';
        }
        if (!empty($posts->builtarea)) {
            $description .= " and buildup-area " . $posts->builtarea->content . ' sqm. The property has ';
        }

        if ($posts->option_data) {
            foreach ($posts->option_data as $value) {
                if ($value->value != 0) {
                    $description .= $value->value . ' ' . $value->category->name . ', ';
                }
            }
        }

        $description .= $posts->property_type->category->name . ' has ' . ($posts->electricity_facility->content == 0 ? 'electricity connection' : "no electricity connection ") . 'and ' . ($posts->water_facility->content == 0 ? 'have water connection. ' : 'no water connection. ');
        $description .= $posts->property_type->category->name . ' built year is ' . (!empty($posts->property_age) ? $posts->property_age->content : ' N/A ');
        $description .= '. ' . $posts->property_type->category->name . ' price is ' . $posts->price->price . ' SAR';
        return $description;
    }

    public function get_status($id)
    {
        if ($id == 1) {
            return 'Published';
        } elseif ($id == 2) {
            return 'Incomplete';
        } elseif ($id == 3) {
            return 'Pending';
        } elseif ($id == 4) {
            return 'Rejected';
        } elseif ($id == 0) {
            return 'Trash';
        } else {
            return 'N/A';
        }
    }

    public function get_property_condition($conditon)
    {
        if (!empty($conditon)) {
            if ($conditon->content == 3) {
                return 'unfurnished';
            } elseif ($conditon->content == 2) {
                return 'semi-furnished';
            } elseif ($conditon->content == 1) {
                return 'furnished';
            }
        } else {
            return 'N/A';
        }
    }

    public function exportCSV(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $from = date($request->from_date);
        $to = date($request->to_date);
        $fileName = $request->from_date . 'to' . $request->to_date . '.csv';
        $tasks = Terms::where('type', 'property')
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->with('rules', 'parentcategory', 'depth', 'length', 'interface', 'property_age', 'meter', 'property_floor', 'post_new_city', 'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'post_district', 'user', 'option_data', 'property_status_type', 'postcategory', 'property_condition')
            ->get();

        if ($tasks->isEmpty()) {
            $msssage = ['message' => 'No recordsfound'];
            return back()->withErrors($msssage)->withInput();
        }
        foreach ($tasks as $data_properties) {
            $final_data[] = $this->property_data_making($data_properties);
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $coulmns_array = [];
        foreach ($final_data[0] as $key => $test) {
            $coulmns[] = $key;
        }
        $coulmns_array = $coulmns;
        $callback = function () use ($tasks, $coulmns_array, $final_data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $coulmns_array);
            foreach ($final_data as $data_properties) {
                $array = $this->array_data($data_properties);
                fputcsv($file, $array);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function array_data($data)
    {
        return array(
            $data['Ad_Id'], $data['Advertiser_character'], $data['Advertiser_name'], $data['Advertiser_mobile_number'],
            $data['The_main_type_of_ad'], $data['Ad_description'], $data['Ad_subtype'], $data['Advertisement_publication_date'], $data['Ad_update_date'], $data['Ad_expiration'], $data['Ad_status'],
            $data['Ad_Views'], $data['District_Name'], $data['City_Name'], $data['Neighbourhood_Name'],
            $data['Street_Name'], $data['Longitude'], $data['Lattitude'], $data['Furnished'], $data['Kitchen'], $data['Air_Condition'],
            $data['facilities'], // 'facilities',
            $data['Using_For'], $data['Property_Type'],
            $data['The_Space'], $data['Land_Number'], $data['Plan_Number'], $data['Number_Of_Units'], $data['Floor_Number'],
            $data['Unit_Number'],
            $data['Rooms_Number'], // 'rooms_number', 
            $data['Rooms_Type'], // 'rooms_type',  
            $data['Real_Estate_Facade'],
            $data['Street_Width'], //'Street_Width', 
            $data['Construction_Date'],
            $data['Rental_Price'],
            $data['Selling_Price'],
            $data['Selling_Meter_Price'],
            $data['Property limits and lenghts'],
            $data['Is there a mortgage or restriction that prevents or limits the use of the property'], $data['Rights and obligations over real estate that are not documented in the real estate document'],
            $data['Information that may affect the property'], $data['Property disputes'],
            $data['Availability of elevators'],
            $data['Number of elevators'], //'Number of elevators', 
            $data['Availability of Parking'],
            $data['Number of parking'], // 'Number of parking', 
            $data['Advertiser category'],
            $data['Advertiser license number'],
            $data["Advertiser's email"],
            $data['Advertiser registration number'],
            $data['Authorization number']

        );
    }
}
