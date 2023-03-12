<?php

namespace Amcoders\Plugin\Post\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Models\City;
use App\Categorymeta;
use App\Models\District;
use Illuminate\Support\Str;
use Auth;
use DB;
use Google\Service\Dfareporting\Resource\Cities;

class LocationController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    $posts = Category::where('type', 'location')->with('preview')->withCount('address')->latest()->paginate(20);
    //return view('plugin::location.index',compact('posts'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function Countries(Request $request)
  {

    $posts = Category::where('type', 'countries')->with('preview')->withCount('address')->latest()->paginate(20);
    return view('plugin::location.country.index', compact('posts'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function CountriesCreate(Request $request)
  {

    return view('plugin::location.country.create');
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function States(Request $request)
  {

    if (!Auth()->user()->can('states.list')) {
      abort(401);
    }
    $posts = Category::where('type', 'states')->with('preview')->withCount('address')->latest()->paginate(20);
    return view('plugin::location.state.index', compact('posts'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function StatesCreate(Request $request)
  {
    if (!Auth()->user()->can('states.create')) {
      abort(401);
    }
    $posts = Category::where('type', 'countries')->with('preview')->withCount('address')->latest()->get();
    return view('plugin::location.state.new_create', compact('posts'));
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function Cities(Request $request)
  {
    if (!Auth()->user()->can('cities.list')) {
      abort(401);
    }
    $posts = City::paginate(100);
    return view('plugin::location.cities.index', compact('posts'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function district(Request $request)
  {
    if (!Auth()->user()->can('district.list')) {
      abort(401);
    }
    $posts = District::leftJoin('cities', function($join) {
      $join->on('districts.p_id', '=', 'cities.id');
    })->select('districts.*','cities.name as city_name','cities.ar_name as arabic_name')->orderBy('cities.id', 'ASC')->paginate(100);
    return view('plugin::location.district.index', compact('posts'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function CitiesCreate(Request $request)
  {
    if (!Auth()->user()->can('cities.create')) {
      abort(401);
    }

    return view('plugin::location.cities.create');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function districtCreate(Request $request)
  {
    if (!Auth()->user()->can('district.create')) {
      abort(401);
    }
    return view('plugin::location.district.create');
  }

  public function info(Request $request)
  {

    return $posts = Category::where('p_id', $request->id)->select('id', 'name')->latest()->get();
  }




  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    return view('plugin::location.create');
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
      'name' => 'required|max:100',
    ]);

    if ($request->slug) {
      $slug = $request->slug;
    } else {
      $slug = Str::slug($request->name);
    }

    if ($request->p_id) {
      $pid = $request->p_id;
    } else {
      $pid = null;
    }
    $category = new Category;
    $category->name = $request->name;
    $category->slug = $slug;
    $category->p_id = $pid;
    $category->type = $request->type;
    $category->featured = $request->featured;
    $category->user_id = Auth::id();
    $category->save();


    $meta = new Categorymeta;
    $meta->category_id = $category->id;
    $meta->type = 'preview';
    $meta->content = $request->preview ?? '';
    $meta->save();

    $data['latitude'] = $request->latitude;
    $data['longitude'] = $request->longitude;
    $data['zoom'] = $request->zoom;
    $map = new Categorymeta;
    $map->category_id = $category->id;
    $map->type = 'mapinfo';
    $map->content = json_encode($data);
    $map->save();
    return response()->json('Location created');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $validatedData = $request->validate([
      'name' => 'required|max:100',
      'ar_name' => 'required|max:100',
    ]);

    if ($request->p_id) {
      $pid = $request->p_id;
    }

    if ($request->type == 'city') {
      $category = new City;
      $category->name = $request->name;
      $category->ar_name = $request->ar_name;
      $category->featured = $request->featured;
      $category->user_id = Auth::id();
      $category->save();
    } elseif ($request->type == 'district') {
      $category = new District();
      $category->name = $request->name;
      $category->ar_name = $request->ar_name;
      $category->p_id = $pid;
      $category->featured = $request->featured;
      $category->user_id = Auth::id();
      $category->save();
    }


    return response()->json('Location created');
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
  public function old_edit($id)
  {
    $info = Category::with('preview', 'map')->find($id);
    if ($info->type == 'countries') {
      $json = json_decode($info->map->content);

      return view('plugin::location.country.edit', compact('info', 'json'));
    } elseif ($info->type == 'cities') {
      if (!Auth()->user()->can('cities.edit')) {
        abort(401);
      }
      $json = json_decode($info->map->content);
      $posts = Category::where('type', 'countries')->latest()->get();
      $parent = Category::find($info->p_id);
      $states = Category::where('type', 'states')->where('p_id', $parent->p_id)->latest()->get();
      $parent = $parent->p_id ?? 0;
      return view('plugin::location.cities.edit', compact('info', 'json', 'posts', 'states', 'parent'));
    } else {
      $json = json_decode($info->map->content);
      $posts = Category::where('type', 'countries')->latest()->get();
      if (!Auth()->user()->can('states.edit')) {
        abort(401);
      }
      return view('plugin::location.state.new_edit', compact('info', 'json', 'posts'));
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    if (!Auth()->user()->can('district.edit')) {
      abort(401);
    }
    $info = District::find($id);
    $cities = City::get();
    return view('plugin::location.district.edit', compact('info', 'cities'));
  }


  public function Citiesedit($id)
  {
    if (!Auth()->user()->can('cities.edit')) {
      abort(401);
    }
    $info = City::find($id);
    return view('plugin::location.cities.edit', compact('info'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function old_update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:100',
      'slug' => 'required|max:100',
    ]);

    $category = Category::find($id);
    $category->name = $request->name;
    if ($request->p_id) {
      $category->p_id = $request->p_id;
    }
    $category->slug = $request->slug;
    $category->save();

    $meta = Categorymeta::where('type', 'preview')->where('category_id', $id)->first();

    if (!empty($meta)) {
      $meta->category_id = $category->id;
      $meta->type = 'preview';
      $meta->content = $request->preview ?? '';
      $meta->save();
    }

    $data['latitude'] = $request->latitude;
    $data['longitude'] = $request->longitude;
    $data['zoom'] = $request->zoom;
    $map = Categorymeta::where('type', 'mapinfo')->where('category_id', $id)->first();
    if (!empty($map)) {
      $map->category_id = $category->id;
      $map->type = 'mapinfo';
      $map->content = json_encode($data);
      $map->save();
    }
    return response()->json('Location Updated');
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
      'ar_name' => 'required|max:100',
    ]);

    if ($request->p_id) {
      $pid = $request->p_id;
    }


    if (empty($pid)) {
      $category = City::find($id);
      $category->name = $request->name;
      $category->ar_name = $request->ar_name;
      $category->featured = $request->featured;
      $category->user_id = Auth::id();
      $category->save();
    } else {
      $category =  District::find($id);
      $category->name = $request->name;
      $category->ar_name = $request->ar_name;
      $category->p_id = $pid;
      $category->featured = $request->featured;
      $category->user_id = Auth::id();
      $category->save();
    }


    return response()->json('Location Updated');
  }



   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function districtdestroy(Request $request)
  {
    if (!Auth()->user()->can('district.delete')) {
      abort(401);
    }
    if ($request->method == 'delete') {
      if ($request->ids) {
        foreach ($request->ids as $id) {
          District::destroy($id);
        }
      }
    }


    return response()->json('District deleted successfully!');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function Citiesdestroy(Request $request)
  {
    if (!Auth()->user()->can('cities.delete')) {
      abort(401);
    }
    if ($request->method == 'delete') {
      if ($request->ids) {
        foreach ($request->ids as $id) {
          City::destroy($id);
        }
      }
    }


    return response()->json('city deleted successfully!');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    if ($request->method == 'delete') {
      if ($request->ids) {
        foreach ($request->ids as $id) {
          Category::destroy($id);
        }
      }
    }


    return response()->json('Post Removed');
  }
}
