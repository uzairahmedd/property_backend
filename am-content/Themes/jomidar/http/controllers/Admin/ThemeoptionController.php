<?php

namespace Amcoders\Theme\jomidar\http\controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Options;
use App\Terms;
use App\Models\Review;
/**
 *
 */
class ThemeoptionController extends controller
{
    public function index()
    {
        return view('view::admin.theme.option');
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:png',
            'favicon' => 'mimes:ico',
        ]);

        $listing_page = Options::where('key','listing_page')->first();
        if($listing_page)
        {
            $listing_page->value = $request->listing_page;
            $listing_page->save();
        }else{
            $listing_page = new Options();
            $listing_page->key = 'listing_page';
            $listing_page->value = $request->listing_page;
            $listing_page->save();
        }

        $theme_color = Options::where('key','theme_color')->first();
        if($theme_color)
        {
            $theme_color->value = $request->theme_color;
            $theme_color->save();
        }else{
            $theme_color = new Options();
            $theme_color->key = 'theme_color';
            $theme_color->value = $request->theme_color;
            $theme_color->save();
        }

        if($request->preview)
        {
            $option = Options::where('key','breadcrumb')->first();
            if($option)
            {
                $option->value = $request->preview;
                $option->save();
            }else{
                $option = new Options();
                $option->key = 'breadcrumb';
                $option->value = $request->preview;
                $option->save();
            }
        }

        $file = $request->file('logo');

        if(isset($file))
        {
            if(file_exists('uploads/logo.png'))
            {
                unlink('uploads/logo.png');
            }

            $imagename =  'logo' . '.' . $file->getClientOriginalExtension();

			$path = 'uploads/';

			$file->move($path, $imagename);
        }

        $favicon = $request->file('favicon');

        if(isset($favicon))
        {
            if(file_exists('uploads/favicon.ico'))
            {
                unlink('uploads/favicon.ico');
            }

            $imagename =  'favicon' . '.' . $favicon->getClientOriginalExtension();

			$path = 'uploads/';

			$favicon->move($path, $imagename);
        }

        return response()->json('Theme Option Updated');

    }
}
