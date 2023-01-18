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

    //display modal box specif id data of property
    public function get_property_data($id)
    {
        $posts = Terms::where('type', 'property')->where('id', $id)
            ->with('parentcategory', 'depth', 'length', 'virtual_tour', 'interface', 'property_age', 'meter', 'total_floors', 'property_floor', 'post_new_city', 'streets',  'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'post_district', 'user', 'option_data', 'property_status_type', 'postcategory', 'property_condition')
            ->first();

        $final_data = $this->property_data_making($posts);

        return response()->json($final_data);
    }

    public function property_data_making($posts)
    {

        return [
            'Ad_Id' => $posts->unique_id,
            'Advertiser_character' => 'discussable',
            'Advertiser_name' => $posts->user->name,
            "Advertiser_mobile_number" => $posts->user->phone,
            "The_main_type_of_ad" => 'Offer',
            "Ad_description" => $this->add_descruption($posts),
            "Ad_subtype" => !empty($posts->property_status_type) ? $posts->property_status_type->category->name : 'N/A',
            "Advertisement_publication_date" => date('d-m-Y', strtotime($posts->created_at)),
            "Ad_update_date" => date('d-m-Y', strtotime($posts->updated_at)),
            "Ad_expiration" => 'discussable',
            "Ad_status" => $this->get_status($posts->status),
            "Ad_Views" => 'discussable',
            "District_Name" => !empty($posts->post_district) ? $posts->post_district->district->name : 'N/A',
            'City_Name' => !empty($posts->post_new_city) ? $posts->post_new_city->city->name : 'N/A',
            'Neighbourhood_Name' => 'N/A',
            'Street_Name' => 'discussable',
            'Longitude' => 'discussable',
            "Lattitude" => 'discussable',
            'Furnished' => $this->get_property_condition($posts->property_condition),
            'Kitchen' => 'N/A',
            'Air_Condition' => 'N/A',
            'facilities' => $this->get_features($posts),
            "Using_For" => !empty($posts->parentcategory) ? Category::where('id', $posts->parentcategory->category_id)->first('name')->name : 'N/A',
            'Property_Type' => !empty($posts->property_type) ? $posts->property_type->category->name : 'N/A',
            'The_Space' => (!empty($posts->builtarea) ? "Built-up area in SQM: " . $posts->builtarea->content : 'N/A') . ', ' . (!empty($posts->landarea) ?  "Land area in SQM: " . $posts->landarea->content : 'N/A'),
            'Land_Number' =>  'N/A',
            "Plan_Number" =>  'N/A',
            'Number_Of_Units' =>  'N/A',
            'Floor_Number' => !empty($posts->property_floor) ? $posts->property_floor->content : 'N/A',
            'Unit_Number' => 'N/A',
            "Rooms_Number" => $this->get_rooms_number($posts),
            "Rooms_Type" => $this->get_rooms_type($posts),
            // 'Real_Estate_Facade' => $posts->id,
            // 'Street_Width' => $posts->slug,
            "Construction_Date" => !empty($posts->property_age) ? $posts->property_age->content : 'N/A',
            "Rental_Price" => !empty($posts->property_status_type) && $posts->property_status_type->category->name == "Rent" ? $posts->price->price : 'N/A',
            'Selling_Price' => !empty($posts->property_status_type) && $posts->property_status_type->category->name == "Sell" ? $posts->price->price : 'N/A',
            'Selling_Meter_Price' => 'N/A',
            "Property limits and lenghts" => (!empty($posts->length) ? 'length in SQM: ' . $posts->length->content : 'N/A') . ', ' . (!empty($posts->depth) ? "Width in SQM" . $posts->depth->content : 'N/A'),
            // "Is there a mortgage or restriction that prevents or limits the use of the property" => 
            // "Rights and obligations over real estate that are not documented in the real estate document" => '',
            // "Information that may affect the property" => '',
            // "Property disputes" => '',
            // "Availability of elevators" => '',
            // "Number of elevators" => '',
            // "Availability of Parking" => '',
            // "Number of parking" => '',
            // "Advertiser category" => '',
            "Advertiser license number" => 'discussable',
            "Advertiser's email" => $posts->user->email,
            "Advertiser registration number" => 'discussable',
            "Authorization number" => 'discussable',
        ];
    }

    public  function get_rooms_type($posts)
    {
        $rooms_type = [];
        foreach ($posts->option_data as $key => $value) {

            if ($value->category->name != 'Parking') {
                array_push($rooms_type, $value->category->name );
            }
        }
       
        return  $rooms_type;
    }

    public  function get_rooms_number($posts)
    {
        $no_rooms = [];
        foreach ($posts->option_data as $key => $value) {

            if ($value->category->name != 'Parking') {
                $name =$value->category->name .':'. $value->value;
                array_push($no_rooms,    $name );
            }
        }
       
        return  $no_rooms;
    }
    public  function get_features($data)
    {
        $features = [];
        foreach ($data->postcategory as $key => $value) {

            if ($value->type == 'features') {
                $name = Category::where([
                    ['id', $value->category_id]
                ])->first();
                array_push($features, !empty($name) ? $name->name : '');
            }
        }
        return  $features;
    }
    public function add_descruption($posts)
    {
        return 'description';
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
}
