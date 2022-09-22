<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Options;
use App\Category;
use DB;
use Auth;
use Cache;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (!Auth()->user()->can('menu')) {
            abort(401);
        }
        $file = file_get_contents( base_path().'/am-content/Themes/theme.json');
        $themes = json_decode($file, true);
        foreach ($themes as $theme) {
            if ($theme['status'] == 'active') {
                $customizer_file = file_get_contents( base_path().'/am-content/Themes/'.$theme['Text Domain'].'/customizer.json');
                $active_theme = json_decode($customizer_file,true);
                foreach ($active_theme as $key => $value) {
                    if ($value['status'] == 'active') {
                       include_once(base_path().'/am-content/Themes/'.$theme['Text Domain'].'/functions.php');

                    }
                }
            }
        }

        if (function_exists('RegisterMenu')) {
           $positions=RegisterMenu();
        }
        $positions=$positions ?? '';
        $menus= Menu::latest()->get();
        $langs=Category::where('type','lang')->get();
       
        return view('admin.menu.create',compact('menus','langs','positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->status==1) {
            if ($request->position == 'header') {
                DB::table('menu')->where('position',$request->position)->where('lang',$request->lang)->update(['status'=>0]);
            }   
        }
        $men=new Menu;
        $men->name=$request->name;
        $men->position=$request->position;
        $men->status=$request->status;
        $men->lang=$request->lang;
        $men->data="[]";
        $men->save();


        return response()->json(['Menu Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if (!Auth()->user()->can('menu')) {
            abort(401);
        }
        $info= Menu::find($id);

        return view('admin.menu.index',compact('info'));
    }
    /*
    update menus json row in  menus table
    */
    public function MenuNodeStore(Request $request)
    {
        $info= Menu::find($request->menu_id);
        $info->data=$request->data;
        $info->save();
        Cache::forget($info->position.$info->lang);
        return response()->json(['Menu Updated']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (!Auth()->user()->can('menu')) {
            abort(401);
        }
         $file = file_get_contents( base_path().'/am-content/Themes/theme.json');
        $themes = json_decode($file, true);
        foreach ($themes as $theme) {
            if ($theme['status'] == 'active') {
                $customizer_file = file_get_contents( base_path().'/am-content/Themes/'.$theme['Text Domain'].'/customizer.json');
                $active_theme = json_decode($customizer_file,true);
                foreach ($active_theme as $key => $value) {
                    if ($value['status'] == 'active') {
                       include_once(base_path().'/am-content/Themes/'.$theme['Text Domain'].'/functions.php');

                    }
                }
            }
        }

        if (function_exists('RegisterMenu')) {
            $positions=RegisterMenu();
        }
        $positions=$positions ?? '';

       $langs=Category::where('type','lang')->get();
       $info= Menu::find($id);
       return view('admin.menu.edit',compact('info','langs','positions'));
      
     
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
        if ($request->status==1) {
           if ($request->position == 'header') {
            DB::table('menu')->where('position',$request->position)->where('lang',$request->lang)->update(['status'=>0]);
        }
    }

    $men= Menu::find($id);
    $men->name=$request->name;
    $men->position=$request->position;
    $men->status=$request->status;
    $men->lang=$request->lang;
    $men->save();
     Cache::forget($request->position.$request->lang);
    return response()->json(['Menu Updated']);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       if ($request->method=='delete') {
           if ($request->ids) {
            foreach ($request->ids as $id) {
               Menu::destroy($id);
           }
       }
   }

   return response()->json(['Menu Removed']);
}


}
