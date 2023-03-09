<?php

namespace Amcoders\Plugin\Post\http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Terms;
use App\Meta;
use App\Category;
use App\Options;
use App\Models\City;
use App\Models\LandBlock;
use App\Models\District;
use App\PostCategory;
use App\Models\Postcategoryoption;
use App\Models\User;
use App\Models\Termrelation;
use App\Models\Price;
use Illuminate\Support\Facades\DB;
use App\Models\PostDistrict;
use App\Models\PostCity;
use Illuminate\Support\Facades\Storage;
use App\Media;
use Image;
use App\Models\Mediapost;
use Str;
use Session;

class PropertyController extends controller
{
    protected $term_id;
    protected $property_type;
    public $email;
    public $name;
    protected $filename;
    protected $ext;
    protected $fullname;

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
            $posts = Terms::where('type', 'property')->where('is_land_block', 0)->whereHas('user', function ($q) {
                return $q->where('email', $this->email);
            })->latest()->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where('is_land_block', 0)->where($request->type, 'LIKE', '%' . $request->src . '%')->latest()->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->where('is_land_block', 0)->latest()->paginate(40);
        }
        $totals = Terms::where('type', 'property')->where('is_land_block', 0)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
            ['is_land_block', 0],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
            ['is_land_block', 0],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
            ['is_land_block', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
            ['is_land_block', 0],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
            ['is_land_block', 0],
        ])->count();
        return view('plugin::properties.index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /**
     * Display a listing of the land blocks.
     *
     * @return \Illuminate\Http\Response
     */
    public function land_block_index(Request $request, $type = "all")
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }
        if ($request->src && $request->type == 'email') {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->where('is_land_block', 1)->whereHas('user', function ($q) {
                return $q->where('email', $this->email);
            })
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where('is_land_block', 1)->where($request->type, 'LIKE', '%' . $request->src . '%')
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->where('is_land_block', 1)
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        }
        $totals = Terms::where('type', 'property')->where('is_land_block', 1)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 4],
        ])->count();
        return view('plugin::properties.land_block_index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /**
     * Create a  land blocks.
     *
     * @return \Illuminate\Http\Response
     */
    public function land_block_create()
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
        $cities = City::where('featured', 1)->get();
        return view('plugin::properties.land_block_create', compact('categories', 'status_category', 'parent_category', 'feature', 'cities'));
    }

    /**
     * Display a listing of the districts.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_districts($city_id)
    {
        return District::where('p_id', $city_id)->where('featured', 1)->select('id', 'name', 'ar_name')->get();
    }

    public function property_nature()
    {
        $parent_category = Category::where('type', 'parent_category')->where('featured', 1)->get();
        return success_response($parent_category, 'Property nature get successfully!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function block_store(Request $request)
    {

        $validatedData = $request->validate([
            'status' => 'required',
            'title' => 'required|max:100',
            'ar_title' => 'required|max:100',
            'district' => 'required',
            'location' => 'required',
            'city' => 'required',
            'property_nature.*' => 'required',
            'plot_price.*' => 'required',
            'plot_number.*' => 'required',
            'planned_number.*' => 'required',
            'total_area.*' => 'required',
            'center_coordinate.*' => 'required',
            'top_right_coordinate.*' => 'required',
            'top_left_coordinate.*' => 'required',
            'bottom_right_coordinate.*' => 'required',
            'bottom_left_coordinate.*' => 'required',
            'right_measurement.*' => 'required',
            'left_measurement.*' => 'required',
            'top_measurement.*' => 'required',
            'bottom_measurement.*' => 'required'
        ], [
            'status.required' => 'Please provide property type',
            'title.required' => 'Please provide property english title',
            'title.max' => 'Maximum english title character are 100',
            'ar_title.required' => 'Please provide property arabic title',
            'ar_title.max' => 'Maximum arabic title character are 100',
            'district.required' => 'Please provide property district',
            'location.required' => 'Please provide property location',
            // 'location.regex' => 'Provide comma seperated location coordinates',
            'city.required' => 'Please provide property city',
            'property_nature.*.required' => 'Please provide all plot nature',
            'plot_price.*.required' => 'Please provide all plot prices',
            'plot_number.*.required' => 'Please provide all plot number',
            'planned_number.*.required' => 'Please provide all plot planned number',
            'total_area.*.required' => 'Please provide Area of land in SQM',
            'center_coordinate.*.required' => 'Please provide all plot center coordinates',
            // 'center_coordinate.*.regex' => 'Provide comma seperated center coordinates',
            'top_right_coordinate.*.required' => 'Please provide all plot top right coordinates',
            // 'top_right_coordinate.*.regex' => 'Provide comma seperated top coordinates',
            'top_left_coordinate.*.required' => 'Please provide all plot top left coordinates',
            // 'top_left_coordinate.*.regex' => 'Provide comma seperated top left coordinates',
            'bottom_right_coordinate.*.required' => 'Please provide all plot bottom right coordinates',
            // 'bottom_right_coordinate.*.regex' => 'Provide comma seperated bottom right coordinates',
            'bottom_left_coordinate.*.required' => 'Please provide all plot bottom left coordinates',
            // 'bottom_left_coordinate.*.regex' => 'Provide comma seperated bottom leftsss coordinates',
            'right_measurement.*.required' => 'Please provide all plot right measurements',
            'left_measurement.*.required' => 'Please provide all plot left measurements',
            'top_measurement.*.required' => 'Please provide all plot top measurements',
            'bottom_measurement.*.required' => 'Please provide all bottom measurements'

        ]);

        //store & update title and slug
        $unique_id = generate_unique_id();
        $slug = Str::slug($request->title) . '-' . $unique_id;
        $term = new Terms;
        $term->user_id = Auth::id();
        $term->unique_id =  $unique_id;
        $term->status = 3;
        $term->type = 'property';
        $term->is_land_block = 1;
        $term->slug = $slug;
        $term->title = $request->title;
        $term->ar_title = $request->ar_title;
        $term->save();
        //post districts
        $district = new PostDistrict;
        $district->term_id = $term->id;
        $district->type = 'district';
        $district->district_id = $request->district;
        $district->value = $request->location;
        $district->save();

        $post_city['term_id'] = $term->id;
        $post_city['city_id'] = $request->city;
        PostCity::insert($post_city);

        //property status create and update
        $post_cat = new PostCategory;
        $post_cat->term_id = $term->id;
        $post_cat->category_id = $request->status;
        $post_cat->type = 'status';
        $post_cat->save();
        // $post_cat['term_id'] = $term->id;
        // $post_cat['category_id'] = $request->status;
        // $post_cat['type'] = 'status';
        // \App\Postcategory::insert($post_cat);

        //for virtual tour and images
        $virtual_tour = new Meta;
        $virtual_tour->term_id = $term->id;
        $virtual_tour->type = 'virtual_tour';
        $virtual_tour->content = $request->virtual_tour;
        $virtual_tour->save();


        unset($request['_token'], $request['virtual_tour']);
        //store images
        $this->upload_images($request, $term->id);
        //store land block coordinates and measurement details
        $this->land_block_detail_save($request->all(), $term->id);

        return success_response($term->id, 'Land block data inserted successfully');
    }


    public function upload_images($request, $term_id)
    {
        $terms = DB::table('terms')->where('id', $term_id)->first();
        $auth_id = $terms->user_id;


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
                    $media->user_id = $auth_id;
                    $media->size = $compress['data']['size'] . 'kib';
                    $media->save();
                    $data = $media;
                }
                if ($term_id) {
                    $mediapost = new Mediapost;
                    $mediapost->term_id = $term_id;
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

    public function land_block_detail_save($data, $term_id)
    {

        unset($data['_token'], $data['status'], $data['title'], $data['ar_title'], $data['city'], $data['district'], $data['location']);
        $plot_number_count =  $data['plot_number'];
        for ($count = 0; $count < count($plot_number_count); $count++) {

            $land_block = new LandBlock;
            $land_block->term_id = $term_id;
            $land_block->parent_category = $data['property_nature'][$count];
            $land_block->price = $data['plot_price'][$count];
            $land_block->plot_number =  $data['plot_number'][$count];
            $land_block->planned_number =  $data['planned_number'][$count];
            $land_block->total_area =  $data['total_area'][$count];
            $land_block->center_coordinate =  $data['center_coordinate'][$count];
            $land_block->top_right_coordinate =  $data['top_right_coordinate'][$count];
            $land_block->top_left_coordinate =  $data['top_left_coordinate'][$count];
            $land_block->bottom_right_coordinate =  $data['bottom_right_coordinate'][$count];
            $land_block->bottom_left_coordinate =  $data['bottom_left_coordinate'][$count];
            $land_block->right_measurement =  $data['right_measurement'][$count];
            $land_block->left_measurement =  $data['left_measurement'][$count];
            $land_block->top_measurement =  $data['top_measurement'][$count];
            $land_block->bottom_measurement =  $data['bottom_measurement'][$count];
            $land_block->save();
        }
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
            })->where('is_land_block', 0)->where('status', $id)->latest()->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where('is_land_block', 0)->where('status', $id)->where($request->type, 'LIKE', '%' . $request->src . '%')->latest()->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->where('is_land_block', 0)->where('status', $id)->latest()->paginate(40);
        }
        $totals = Terms::where('type', 'property')->where('is_land_block', 0)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['is_land_block', 0],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['is_land_block', 0],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['is_land_block', 0],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['is_land_block', 0],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['is_land_block', 0],
            ['status', 4],
        ])->count();

        $type = $id;
        return view('plugin::properties.index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function land_block_show(Request $request, $id)
    {
        if (!Auth()->user()->can('Properties.list')) {
            abort(401);
        }

        if ($request->src && $request->type == 'email') {
            $this->email = $request->src;
            $posts = Terms::where('type', 'property')->whereHas('user', function ($q) {
                return $q->where('email', $this->email);
            })
                ->where('is_land_block', 1)
                ->where('status', $id)
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        } elseif ($request->src) {
            $posts = Terms::where('type', 'property')->where('status', $id)->where($request->type, 'LIKE', '%' . $request->src . '%')
                ->where('is_land_block', 1)
                ->where('status', $id)
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        } else {
            $posts = Terms::where('type', 'property')->where('status', $id)->where('is_land_block', 1)
                ->where('status', $id)
                ->join('land_block_details', 'land_block_details.term_id', '=', 'terms.id')
                ->select(
                    'terms.*',
                    DB::raw("count(land_block_details.term_id) AS total_lands")
                )
                ->groupBy('terms.id')
                ->latest('terms.created_at')->paginate(40);
        }
        $totals = Terms::where('type', 'property')->where('is_land_block', 1)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 1],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 2],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 3],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['is_land_block', 1],
            ['status', 4],
        ])->count();

        $type = $id;
        return view('plugin::properties.land_block_index', compact('type', 'posts', 'totals', 'pendings', 'actives', 'incomplete', 'trash', 'pendings', 'request', 'rejected'));
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
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('is_land_block', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('email', $this->email);
                })->latest()->paginate(25);
        } elseif ($request->src && ($request->type == 'name')) {
            $this->name = $request->src;
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('is_land_block', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')
                ->whereHas('user', function ($q) {
                    return $q->where('name', $this->name);
                })->latest()->paginate(25);
        } else {
            $posts = Terms::where('type', 'property')->where('resource', 0)->where('is_land_block', 0)->with('parentcategory', 'post_new_city', 'builtarea', 'landarea', 'price', 'post_district', 'user', 'property_status_type')->latest()->paginate(25);
        }
        $totals = Terms::where('type', 'property')->where('resource', 0)->where('is_land_block', 0)->count();
        $actives = Terms::where([
            ['type', 'property'],
            ['status', 1],
            ['is_land_block', 0],
            ['resource', 0],
        ])->count();
        $incomplete = Terms::where([
            ['type', 'property'],
            ['status', 2],
            ['is_land_block', 0],
            ['resource', 0],
        ])->count();
        $trash = Terms::where([
            ['type', 'property'],
            ['status', 0],
            ['is_land_block', 0],
            ['resource', 0],
        ])->count();
        $pendings = Terms::where([
            ['type', 'property'],
            ['status', 3],
            ['is_land_block', 0],
            ['resource', 0],
        ])->count();
        $rejected = Terms::where([
            ['type', 'property'],
            ['status', 4],
            ['is_land_block', 0],
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
        $posts = Terms::where('type', 'property')->where('resource', 0)->where('is_land_block', 0)->where('id', $id)
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
            "Ad_update_date" =>  'N/A', //date('d-m-Y', strtotime($posts->updated_at)),
            "Ad_expiration" => date('d-m-Y', strtotime($posts->created_at->addMonths(3))),
            "Ad_status" => $this->get_status($posts->status),
            "Ad_Views" => $posts->count,
            "District_Name" => !empty($posts->post_district) ? @$posts->post_district->district->name : 'N/A',
            'City_Name' => !empty($posts->post_new_city) ? @$posts->post_new_city->city->name : 'N/A',
            'Neighbourhood_Name' => !empty($posts->post_district) ? @$posts->post_district->district->name : 'N/A',
            'Street_Name' => 'N/A',
            'Longitude' => !empty($posts->post_district) && !empty($posts->post_district->value)  ? @$this->get_coordinate($posts->post_district->value, 0) : 'N/A',
            "Lattitude" => !empty($posts->post_district) && !empty($posts->post_district->value)  ? @$this->get_coordinate($posts->post_district->value, 1) : 'N/A',
            'Furnished' => $this->get_property_condition($posts->property_condition),
            'Kitchen' => $this->get_features_type($posts, 'Kitchen'),
            'Air_Condition' => $this->get_features_type($posts, 'Air Conditioned'),
            'facilities' => $this->get_features($posts),
            "Using_For" => !empty($posts->parentcategory) ? Category::where('id', $posts->parentcategory->category_id)->first('name')->name : 'N/A',
            'Property_Type' => !empty($posts->property_type) ? $posts->property_type->category->name : 'N/A',
            'The_Space' => (!empty($posts->builtarea) ? "Built-up area in SQM: " . $posts->builtarea->content . ',' : ' ') . ' ' . (!empty($posts->landarea) ?  "Land area in SQM: " . $posts->landarea->content : ' '),
            'Land_Number' =>  'N/A',
            "Plan_Number" =>  'N/A',
            'Number_Of_Units' =>  $this->get_option_number($posts, 'Appartments'),
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
            "Availability of Parking" =>  $this->get_option_number($posts, 'Parking') != 'N/A' ? 'Yes' : 'N/A',
            "Number of parking" => $this->get_option_number($posts, 'Parking'),
            "Advertiser category" => $this->advertiser_category($posts),
            "Advertiser license number" => !empty($posts->user->user_credentials) && !empty($posts->user->user_credentials->rega_number)  ? $posts->user->user_credentials->rega_number : 'N/A',
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
    public  function get_rooms_type($posts)
    {
        $rooms_type = [];
        foreach ($posts->option_data as $key => $value) {

            if (
                $value->category->name == 'Living-room' || $value->category->name == 'Guest-room'
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
        $description = (!empty($posts->property_type) ? $posts->property_type->category->name : 'Property') . ' for ' . $posts->property_status_type->category->name . ' in, ' .
            @$posts->post_district->district->name . ', ' .  @$posts->post_new_city->city->name . '.';
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
            ->where('is_land_block', 0)
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
