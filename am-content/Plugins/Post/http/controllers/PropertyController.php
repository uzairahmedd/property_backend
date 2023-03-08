<?php

namespace Amcoders\Plugin\Post\http\controllers;

use App\Media;
use App\Models\District;
use App\Models\Mediapost;
use App\Models\PostCity;
use App\Models\PostDistrict;
use App\Options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\Terms;
use Illuminate\Support\Str;
use App\Meta;
use App\Category;
use App\Models\City;
use App\Postcategory;
use App\Models\Postcategoryoption;
use App\Models\User;
use App\Models\Termrelation;
use App\Models\Price;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
     * @param \Illuminate\Http\Request $request
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
            "level" => "success",
            "message" => "Project Created Successfully"
        ]);

        return redirect()->route('admin.property.edit', $term->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if (!Auth()->user()->can('Properties.edit')) {
            abort(401);
        }

        $this->term_id = $id;

        $info = Terms::where([
            ['type', 'property'],
            ['id', $id]
        ])->with('depth', 'length','medias', 'virtual_tour', 'interface', 'instrument_number', 'property_age', 'meter', 'total_floors', 'property_floor', 'post_new_city', 'id_number', 'post_preview', 'streets', 'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'ready', 'post_district', 'user', 'multiple_images', 'option_data', 'property_status_type', 'postcategory', 'property_condition', 'property_type')->withCount('reviews')->first();

        $post_parent_category = Postcategory::where('type', 'parent_category')->where('term_id', $id)->first();

//        dd($post_parent_category);

        $child_category = Category::where('type', 'parent_category')->where('id', $post_parent_category->category_id)->with('parent')->get();

        $status_category = Category::where('type', 'status')->where('featured', 1)->get();

        $instrument = Terms::with('rules', 'id_number', 'instrument_number')->where('user_id', Auth::id())->findorFail($id);

        $cities = City::where('featured', 1)->get();

        $district = District::where('featured', 1)->get();

        $postDistrict = PostDistrict::where('type', 'district')->get();

        $parent_category = Category::where('type', 'parent_category')->get();

        $interfaces = Meta::where('type', 'interface')->get();

        $categories_data = Category::where('type', 'feature')->where('featured', 1)->get();

        $user_id = DB::table('user_credentials')->where('user_id', $id)->first();

        $property_nature = Category::where('type', 'parent_category')->with('category_parent')->where('id', $request->id)->where('featured', 1)->get();

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


        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
            if ($value->type == 'category') {
                $this->property_type = $value->category_id;
            }
        }

        $features_array = [];
        foreach ($info->postcategory as $key => $value) {
            array_push($features_array, $value->category_id);
        }

        return view('plugin::properties.new_edit', compact('info', 'user_id', 'post_parent_category', 'instrument', 'categories_data', 'array', 'property_nature', 'status_category', 'parent_category', 'child_category', 'features_array', 'cities', 'district', 'postDistrict', 'interfaces'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //store & update title and slug
        $term = Terms::where('user_id', Auth::id())->where('id', $id)->first();
        $unique_id = generate_unique_id();
        $slug = \Illuminate\Support\Str::slug($request->title).'-'.$unique_id;
        if (empty($term)) {
            $term = new Terms;
            $term->user_id = Auth::id();
            $term->unique_id =  $unique_id;
            $term->status = 3;
            $term->type = 'property';
        }
        $term->slug = $slug;
        $term->title = $request->title;
        $term->ar_title = $request->ar_title;
        $term->save();

        //store & update property district and location
        $district = PostDistrict::where('term_id', $term->id)->where('type', 'district')->first();
        if (empty($district)) {
            $district = new PostDistrict;
            $district->term_id = $term->id;
            $district->type = 'district';
        }
        $district->district_id = $request->district;
        $district->value = $request->location;
        $district->save();

        //store & update property city
        $post_city['term_id'] = $term->id;
        $post_city['city_id'] = $request->city;
        PostCity::where('term_id', $term->id)->delete();
        PostCity::insert($post_city);

        //property status create and update
        $post_cat['term_id'] = $term->id;
        $post_cat['category_id'] = $request->status;
        $post_cat['type'] = 'status';
        Postcategory::where('type', 'status')->where('term_id', $term->id)->delete();
        Postcategory::insert($post_cat);

        return response()->json(['Property Updated Successfully']);
    }

    public function second_update_property(Request $request, $id)
    {
        $term_id = $id;
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

        //for property age
        $property_age = Meta::where('term_id', $term_id)->where('type', 'property_age')->first();
        if ($request->ready == '1') {
            if (empty($property_age)) {
                $property_age = new Meta;
                $property_age->term_id = $term_id;
                $property_age->type = 'property_age';
            }
            $property_age->content = $request->property_age;
            $property_age->save();
        } else {
            Meta::where('term_id', $term_id)->where('type', 'property_age')->delete();
        }

        //del already exist area
        Meta::where('term_id', $term_id)->where('type', 'landarea')->delete();
        Meta::where('term_id', $term_id)->where('type', 'builtarea')->delete();
        //street info ,slectricity and water flag store and update
        $interface = implode(',',  $request->interface);
        $meter = implode(',',  $request->meter);
        $data = $request->all();
        $data['meter'] = $meter;
        $data['interface'] = $interface;
        unset($data['_token'], $data['_method'], $data['parent_category'], $data['category'], $data['price'], $data['property_age']);
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
        //if land,Warehouse and farm then skip third step for facilities
        if (!empty($check_category) && Str::contains($check_category->name, 'land')) {

            $this->remove_input_page_data($term_id);
            return response()->json(['Property Updated Successfully']);
        }
        if (!empty($check_category) && Str::contains($check_category->name, 'Farm')) {
            $this->remove_input_page_data($term_id);
            return response()->json(['Property Updated Successfully']);
        }
        if (!empty($check_category) && Str::contains($check_category->name, 'Warehouse')) {
            $this->remove_input_page_data($term_id);
            return response()->json(['Property Updated Successfully']);
        }
        return response()->json(['Property Updated Successfully']);
    }


    public function third_update_property(Request $request, $id)
    {
        $term_id = $id;
        //store number of features
        $options = [];
        foreach ($request->get_data ?? [] as $key => $value) {
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
        Meta::where('term_id', $term_id)->where('type', 'property_condition')->delete();
        if (isset($request->furnishing)) {
            $meta = new Meta;
            $meta->term_id = $term_id;
            $meta->type =  'property_condition';
            $meta->content = $request['furnishing'];
            $meta->save();
        }

        //property total floors condition store & update
        Meta::where('term_id', $term_id)->where('type', 'total_floors')->delete();
        if (isset($request->total_floors)) {
            $meta_role = new Meta;
            $meta_role->term_id = $term_id;
            $meta_role->type =  'total_floors';
            $meta_role->content = $request['total_floors'];
            $meta_role->save();
        }

        //property floors condition store & update
        Meta::where('term_id', $term_id)->where('type', 'property_floor')->delete();
        if (isset($request->property_floor)) {
            $property_floor = new Meta;
            $property_floor->term_id = $term_id;
            $property_floor->type =  'property_floor';
            $property_floor->content = $request['property_floor'];
            $property_floor->save();
        }

        return response()->json(['Property Updated Successfully']);
    }

    public function fourth_update_property(Request $request, $id)
    {
//        $validator = \Validator::make($request->all(), [
//            'media.*' => 'mimes:jpeg,jpg,png|max:20480',
//        ]);
//        if ($validator->fails()) {
//            return back()->withErrors($validator->errors())->withInput();
//        }

        if ($request->hasfile('media'))
            foreach ($request->file('media') as $image) {
                $ext = $image->getClientOriginalExtension();
                if ($ext == 'jfif') {
                    return back()->withErrors(['error' => 'PLease provide jpg/png images'])->withInput();
                }
            }

        $term_id = $id;

        //store images
        $this->upload_images($request, $term_id);
        return response()->json(['Property Updated Successfully']);
    }

    public function fifth_update_property(Request $request, $id)
    {
        $term_id = $id;
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

        //length and depth
        $data = $request->all();
        unset($data['_token'], $data['_method'], $data['features']);
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
        return response()->json(['Property Updated Successfully']);
    }

    public function sixth_update_property(Request $request, $id)
    {
        $term_id = $id;
        $rule_data = isset($request['rule']) ? implode(',', $request['rule']) : 0;
        $rule = Meta::where('term_id', $term_id)->where('type', 'rules')->first();
        if (empty($rule)) {
            $rule = new Meta;
            $rule->term_id = $term_id;
            $rule->type = 'rules';
        }
        $rule->content = $rule_data;
        $rule->save();

        $data = $request->all();
        unset($data['_token'], $data['_method'], $data['rule']);
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
        return response()->json(['Property Updated Successfully']);
    }

    public function get_property_type(Request $request)
    {
        $info = Category::where('type', 'parent_category')->with('category_parent')->where('id', $request->id)->where('featured', 1)->get();
        return $info;
    }

    public function get_data($id)
    {
        $this->term_id = $id;
        $array = [];
        $property_type = null;
        $info = Terms::with('postcategory')->where('id', $id)->first();
        //if land,Warehouse and farm is property type
        if (!empty($info->property_type) && \Illuminate\Support\Str::contains($info->property_type->category->name, 'land')) {
            $this->remove_input_page_data($this->term_id);
            return response()->json(['Property Updated Successfully']);
        }
        if (!empty($info->property_type) && Str::contains($info->property_type->category->name, 'Farm')) {
            $this->remove_input_page_data($this->term_id);
            return response()->json(['Property Updated Successfully']);
        }
        if (!empty($info->property_type) && Str::contains($info->property_type->category->name, 'Warehouse')) {
            $this->remove_input_page_data($this->term_id);
            return response()->json(['Property Updated Successfully']);
        }


        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
            if ($value->type == 'category') {
                $this->property_type = $value->category_id;
            }
        }

        $data['get_data'] = Category::where('type', 'option')->where('featured', 1)->whereHas('child', function ($q) {
            return $q->where('id', $this->property_type);
        })->with(['post_category_option' => function ($q) {
            return $q->where('term_id', $this->term_id);
        }])->get();

        return success_response($data, 'Data get Successfully!');
    }

    public function remove_input_page_data($term_id)
    {
        Postcategoryoption::where('type', 'options')->where('term_id', $term_id)->delete();
        Meta::where('term_id', $term_id)->where('type', 'property_condition')->delete();
        Meta::where('term_id', $term_id)->where('type', 'total_floors')->delete();
        Meta::where('term_id', $term_id)->where('type', 'property_floor')->delete();
        Postcategory::where('type', 'features')->where('term_id', $term_id)->delete();
    }


    public function get_all_features($id)
    {
        $term_id = $id;
        $data = [];
        $info = Terms::with('postcategory', 'property_type')->findorFail($term_id);
        $data['categories_data'] = Category::where('type', 'feature')->where('featured', 1)->get();
        $data['property_data'] = $info->property_type;
        $array=[];
        foreach ($info->postcategory as $key => $value) {
            array_push($array, $value->category_id);
        }

        $data['post_features']= $array;
        return success_response($data, 'Data get Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth()->user()->can('Properties.edit')) {
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
        if (!Auth()->user()->can('csv.list')) {
            abort(401);
        }

        if ($request->src && ($request->type == 'email')) {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->where('resource', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('email', $this->email);
                })->latest()->paginate(25);
        } elseif ($request->src && ($request->type == 'name')) {
            $this->name = $request->src;
            $posts = Terms::where('type', 'property')->where('resource', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('name', $this->name);
                })->latest()->paginate(25);
        } else {
            $posts = Terms::where('type', 'property')->where('resource', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')->latest()->paginate(25);
        }
        $totals = Terms::where('type', 'property')->where('resource', 0)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
            ['resource', 0],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
            ['resource', 0],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
            ['resource', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
            ['resource', 0],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
            ['resource', 0],
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
        if (!Auth()->user()->can('csv.list')) {
            abort(401);
        }

        if ($request->src && ($request->type == 'email')) {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('email', $this->email);
                })->latest()->paginate(25);
        } elseif ($request->src && ($request->type == 'name')) {
            $this->name = $request->src;
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('name', $this->name);
                })->latest()->paginate(25);
        } else {
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('status', $id)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')->latest()->paginate(25);
        }
        $totals = Terms::where('type', 'property')->where('resource', 0)->where('status', $id)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
            ['resource', 0],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
            ['resource', 0],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
            ['resource', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
            ['resource', 0],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
            ['resource', 0],
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
        $posts = Terms::where('type', 'property')->where('resource', 0)->where('id', $id)
            ->with('rules', 'parentcategory', 'depth', 'length', 'property_age', 'meter', 'property_floor', 'post_new_city', 'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'post_district', 'user', 'option_data', 'property_status_type', 'property_type', 'postcategory', 'property_condition')
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
            "Ad_update_date" => 'N/A', //date('d-m-Y', strtotime($posts->updated_at)),
            "Ad_expiration" => date('d-m-Y', strtotime($posts->created_at->addMonths(3))),
            "Ad_status" => $this->get_status($posts->status),
            "Ad_Views" => $posts->count,
            "District_Name" => !empty($posts->post_district) ? @$posts->post_district->district->name : 'N/A',
            'City_Name' => !empty($posts->post_new_city) ? @$posts->post_new_city->city->name : 'N/A',
            'Neighbourhood_Name' => !empty($posts->post_district) ? @$posts->post_district->district->name : 'N/A',
            'Street_Name' => 'N/A',
            'Longitude' => !empty($posts->post_district) && !empty($posts->post_district->value) ? @$this->get_coordinate($posts->post_district->value, 0) : 'N/A',
            "Lattitude" => !empty($posts->post_district) && !empty($posts->post_district->value) ? @$this->get_coordinate($posts->post_district->value, 1) : 'N/A',
            'Furnished' => $this->get_property_condition($posts->property_condition),
            'Kitchen' => $this->get_features_type($posts, 'Kitchen'),
            'Air_Condition' => $this->get_features_type($posts, 'Air Conditioned'),
            'facilities' => $this->get_features($posts),
            "Using_For" => !empty($posts->parentcategory) ? Category::where('id', $posts->parentcategory->category_id)->first('name')->name : 'N/A',
            'Property_Type' => !empty($posts->property_type) ? $posts->property_type->category->name : 'N/A',
            'The_Space' => (!empty($posts->builtarea) ? "Built-up area in SQM: " . $posts->builtarea->content . ',' : ' ') . ' ' . (!empty($posts->landarea) ? "Land area in SQM: " . $posts->landarea->content : ' '),
            'Land_Number' => 'N/A',
            "Plan_Number" => 'N/A',
            'Number_Of_Units' => $this->get_option_number($posts, 'Appartments'),
            'Floor_Number' => !empty($posts->property_floor) && !empty($posts->property_floor->content) ? $posts->property_floor->content : 'N/A',
            'Unit_Number' => 'N/A',
            "Rooms_Number" => $this->get_option_number($posts, 'Bedroom'),
            "Rooms_Type" => $this->get_rooms_type($posts),
            'Real_Estate_Facade' => 'N/A',
            'Street_Width' => $this->get_street_widths($posts),
            "Construction_Date" => !empty($posts->property_age) ? $posts->property_age->content : 'N/A',
            "Rental_Price" => !empty($posts->property_status_type) && !empty($posts->price) && $posts->property_status_type->category->name == "Rent" ? $posts->price->price . ' SAR' : 'N/A',
            'Selling_Price' => !empty($posts->property_status_type) && !empty($posts->price) && $posts->property_status_type->category->name == "Sale" ? $posts->price->price . ' SAR' : 'N/A',
            'Selling_Meter_Price' => 'N/A',
            "Property limits and lenghts" => (!empty($posts->length) && !empty($posts->length->content) ? 'length in SQM: ' . $posts->length->content . ',' : ' ') . ' ' . (!empty($posts->depth) && !empty($posts->depth->content) ? "Width in SQM: " . $posts->depth->content : 'N/A'),
            "Is there a mortgage or restriction that prevents or limits the use of the property" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '1') ? '1' : '0'),
            "Rights and obligations over real estate that are not documented in the real estate document" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '2') ? '2' : '0'),
            "Information that may affect the property" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '3') ? '3' : '0'),
            "Property disputes" => $this->get_rule_type(!empty($posts->rules) && Str::contains($posts->rules->content, '4') ? '4' : '0'),
            "Availability of elevators" => $this->get_option_number($posts, 'Elevator') != 'N/A' ? 'Yes' : 'N/A',
            "Number of elevators" => $this->get_option_number($posts, 'Elevator'),
            "Availability of Parking" => $this->get_option_number($posts, 'Parking') != 'N/A' ? 'Yes' : 'N/A',
            "Number of parking" => $this->get_option_number($posts, 'Parking'),
            "Advertiser category" => $this->advertiser_category($posts),
            "Advertiser license number" => !empty($posts->user->user_credentials) && !empty($posts->user->user_credentials->rega_number) ? $posts->user->user_credentials->rega_number : 'N/A',
            "Advertiser's email" => $posts->user->email,
            "Advertiser registration number" => 'N/A',
            "Authorization number" => 'N/A',
        ];
    }

    public function get_coordinate($coordinates, $key)
    {
        $data = explode(',', $coordinates);
        if (count($data) > 0) {
            return $data[$key];
        } else {
            return 'N/A';
        }
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

    public function get_rooms_type($posts)
    {
        $rooms_type = [];
        foreach ($posts->option_data as $key => $value) {

            if ($value->category->name == 'Living-room' || $value->category->name == 'Guest-room'
                || $value->category->name == 'Bedroom'
            ) {
                array_push($rooms_type, $value->category->name);
            }
        }

        if (!empty($rooms_type)) {
            return implode(',', $rooms_type);
        } else {
            return 'N/A';
        }
    }

    public function get_option_number($posts, $type_name)
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


    public function get_features_type($data, $feature_name)
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

    public function get_features($data)
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
        $description = (!empty($posts->property_type) ? $posts->property_type->category->name : 'Property') . ' for ' . $posts->property_status_type->category->name . ' in, ' .
            @$posts->post_district->district->name . ', ' . @$posts->post_new_city->city->name . '.';
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

        $description .= (!empty($posts->property_type) ? $posts->property_type->category->name : 'Property') . ' has ' . (!empty($posts->electricity_facility) && $posts->electricity_facility->content == 0 ? 'electricity connection ' : "no electricity connection ") . 'and ' . (!empty($posts->water_facility) && $posts->water_facility->content == 0 ? 'have water connection. ' : 'no water connection. ');
        $description .= (!empty($posts->property_type) ? $posts->property_type->category->name : 'Property') . ' built year is ' . (!empty($posts->property_age) ? $posts->property_age->content : ' N/A ');
        $description .= '. ' . (!empty($posts->property_type) ? $posts->property_type->category->name : 'Property') . ' price is ' . (!empty($posts->price) ? $posts->price->price . ' SAR' : '');
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
        if (!Auth()->user()->can('csv.export')) {
            abort(401);
        }
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
            ->where('resource', 0)
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->with('rules', 'parentcategory', 'depth', 'length', 'interface', 'property_age', 'meter', 'property_floor', 'post_new_city', 'builtarea', 'landarea', 'price', 'electricity_facility', 'water_facility', 'post_district', 'user', 'option_data', 'property_status_type', 'postcategory', 'property_type', 'property_condition')
            ->get();

        if ($tasks->isEmpty()) {
            $msssage = ['message' => 'No record found'];
            return back()->withErrors($msssage)->withInput();
        }
        foreach ($tasks as $data_properties) {
            $final_data[] = $this->property_data_making($data_properties);
        }

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
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

    public function upload_images($request, $term_id)
    {
        $term = Terms::where('id', $term_id)->first();

        $info = Options::where('key', 'lp_filesystem')->first();

        $info = json_decode($info->value);

        $imageSizes = json_decode(imageSizes());

        if ($request->hasfile('media')) {

            foreach ($request->file('media') as $image) {

                $name = uniqid() . date('dmy') . time() . "." . $image->getClientOriginalExtension();
                $ext = $image->getClientOriginalExtension();

                $this->fullname = date('dmy') . time() . uniqid() . '.' . $image->getClientOriginalExtension();

                $path = 'uploads/' . date('y') . '/' . date('m') . '/';


                if (substr($image->getMimeType(), 0, 5) == 'image' &&  $ext != 'ico' && $ext != 'jfif') {

                    $image->move($path, $name);
                    // Storage::disk('oci')->putFile('uploads', $image);
                    $compress = $this->run($path . $name, $ext, $info->compress);

                    if (file_exists($path . $name)) {
                        if (!in_array(strtolower($ext), array('png', 'gif'))) {

                            unlink($path . $name);
                        }
                    }

                    if ($info->system_type == 'do') {
                        $file = asset($compress['data']['image']);

                        $upload = Storage::disk('oci')->putFileAs(date('Ym'), $file, $compress['data']['name'], 'public');

                        $fileUrl = $info->system_url . '/' . $upload;


                        $newpath = date('Ym');
                        $filename = $compress['data']['name'];


                        $imgArr = explode('.', $compress['data']['name']);



                        foreach ($imageSizes as $size) {
                            $img = Image::make($compress['data']['image']);
                            $img->fit($size->width, $size->height);
                            $moved = $img->save('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1]);

                            $resizeIMG = asset('uploads/' . date('y') . '/' . date('m') . '/' . $imgArr[0] . $size->key . '.' . $imgArr[1]);

                            Storage::disk('oci')->putFileAs(date('Ym'), $resizeIMG, $imgArr[0] . $size->key . '.' . $imgArr[1], 'public');
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
                    $media->user_id = $term->user_id;
                    $media->size = $compress['data']['size'] . 'kib';
                    $media->save();
                    $data = $media;
                }
                if ($term_id) {
                    $mediapost = new Mediapost;
                    $mediapost->term_id = $term->id;
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

}
