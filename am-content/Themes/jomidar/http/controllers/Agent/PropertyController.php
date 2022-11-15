<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Terms;
use App\Meta;
use App\PostCategory;
use App\Models\Postcategoryoption;
use App\Models\Termrelation;
use App\Models\Price;
use App\Models\User;
use Str;
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
        $contents->content = $request->content;
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
}
