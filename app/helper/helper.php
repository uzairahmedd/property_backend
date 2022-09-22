<?php
use App\Terms;
use App\Options;
use Amcoders\Lpress\Lphelper;

/*
replace image name via $name from $url
*/
function ImageSize($url,$name){
	$img_arr=explode('.', $url);
	$ext='.'.end($img_arr);
	$newName=str_replace($ext, $name.$ext, $url);
	return $newName;
}

function breadcrumb()
{
	$option = Options::where('key','breadcrumb')->first();
	if($option)
	{
		return $option->value;
	}else{
		return null;
	}
}

function theme_color()
{
	$theme_color = Options::where('key','theme_color')->first();
	if($theme_color)
	{
		return $theme_color->value;
	}else{
		return "#274ABB";
	}
}

function list_page()
{
	$listing_page = Options::where('key','listing_page')->first();
	if($listing_page)
	{
		if($listing_page->value == 'without_map')
		{
			return 'list';
		}else{
			return 'map';
		}
	}else{
		return 'list';
	}
}

function imageSizes()
{
	$sizes='[{"key":"small","height":"80","width":"80"},{"key":"medium","height":"270","width":"270"}]';
	return $sizes;
}

function currency_icon()
{
	return $icon= cache()->remember('currency',420,function(){
	  $currency=Options::where('key','currency_icon')->first();
	   return $currency->value;
    });
}

function format_currency($amount){
	$value = Cache::remember('currency_settings', 400, function () {
		 $data=Options::where('key','payment_settings')->first();
		 return $data=json_decode($data->value);
	});

	if($value->currency_position == 'left'){
			return $value->currency_icon.$amount;
	}
	return $amount.$value->currency_icon;
}


function amount_format($amount,$array=false)
{
	$default_currency=default_currency();

	if (!Session::has('currency')) {
		$put_curryncy=\App\Category::where('type','currency')->with('position')->where('status',1)->first();
		Session::put('currency', $put_curryncy);
		$info['name']=$put_curryncy->name;
		$info['id']=$put_curryncy->id;
		$info['slug']=$put_curryncy->slug;
		$info['position']=$put_curryncy->position->content;
		Session::put('currency_info', $info);
	}
	$currency=Session::get('currency');

	if ($default_currency->name==$currency->name) {
		$format=number_format($amount,2);
		$name=$default_currency->name;
		if ($currency->position->content=="left") {
			$row=$currency->slug.$format;
		}
		else{
			$row=$format.$currency->slug;
		}
	}
	else{
		$num=$amount*$currency->featured;
		$format=number_format($num,2);
		$name=$currency->name;
		if ($currency->position->content=="left") {
			$row=$currency->slug.$format;
		}
		else{
			$row=$format.$currency->slug;
		}
	}
	if ($array==false) {
	 return $row;
	}
	else{
		$data['currency']=$name;
		$data['total']=$format;

		return $data;
	}

}

function amount_calculation($amount)
{
	$default_currency=default_currency();

	if (!Session::has('currency')) {
		$put_curryncy=\App\Category::where('type','currency')->with('position')->where('status',1)->first();
		Session::put('currency', $put_curryncy);
		$info['name']=$put_curryncy->name;
		$info['id']=$put_curryncy->id;
		$info['slug']=$put_curryncy->slug;
		$info['position']=$put_curryncy->position->content;
		Session::put('currency_info', $info);
	}
	$currency=Session::get('currency');

	if ($default_currency->name==$currency->name) {
		return str_replace(',','',number_format($amount,2));

	}
	else{
		$num=$amount*$currency->featured;
		return str_replace(',','',number_format($num,2));

	}


}

function default_currency()
{
	if (Cache::has('default_currency')) {
		$value=Cache::get('default_currency');
	}
	else{
		$value = Cache::remember('default_currency', 400, function () {
			return $default_currency=\App\Category::where('type','currency')->with('position')->where('status',1)->first();
		});

		Cache::remember('default_currency_info', 400, function () {
			$put_curryncy=Cache::get('default_currency');
			$info['name']=$put_curryncy->name;
			$info['id']=$put_curryncy->id;
			$info['icon']=$put_curryncy->slug;
			$info['rate']=$put_curryncy->featured;
			$info['position']=$put_curryncy->position->content;
		    return $info;
	   });
	}
	return $value;
}

function all_currency(){
	return Cache::remember('all_currency', 400, function () {
			return $default_currency=\App\Category::where('type','currency')->get();
	});
}

function get_currency_info(){
	if(Session::has('currency_info')){
	  $currency_info=Session::get('currency_info');

	}
	elseif(Cache::has('default_currency_info')){
		 $currency_info = Cache::get('default_currency_info');
	}
	else{
		 $info=Cache::remember('default_currency_info', 400, function () {
			$default_currency=\App\Category::where('type','currency')->with('position')->where('status',1)->first();
			$info['name']=$default_currency->name;
			$info['id']=$default_currency->id;
			$info['icon']=$default_currency->slug;
			$info['rate']=$default_currency->featured;
			$info['position']=$default_currency->position->content;
		    return $info;
		});
		$currency_info=$info;
	}

	return $currency_info;
}


 /**
 * genarate frontend menu.
 *
 * @param $position=menu position
 * @param $ul=ul class
 * @param $li=li class
 * @param $a=a class
 * @param $icon= position left/right
 * @param $lang= translate true or false
 */

function Menu($position,$ul='',$li='',$a='',$icon_position='top',$lang=false)
{
	return Lphelper::Menu($position,$ul,$li,$a,$icon_position,$lang);
}

 /**
 * genarate frontend menu.
 *
 * @param $position=menu position
 * @param $ul=ul class
 * @param $li=li class
 * @param $a=a class
 * @param $icon= position left/right
 * @param $lang= translate true or false
 */

function MenuCustom($position,$ul='',$li='',$a='',$icon_position='top',$lang=false)
{
	return Lphelper::MenuCustom($position,$ul,$li,$a,$icon_position,$lang);
}


function ConfigCategory($type,$select = ''){
	return Lphelper::ConfigCategory($type,$select);

}
/*
return total active language
*/
function adminLang($c='')
{
	return Lphelper::AdminLang($c);
}

function disquscomment()
{
	return Lphelper::Disqus();
}

/*
return options value
*/
function LpOption($key,$array=false,$translate=false){
	if ($translate == true) {
		$data=Options::where('key',$key)->where('lang',Session::get('locale'))->select('value')->first();
		if (empty($data)) {
			$data=Options::where('key',$key)->select('value')->first();

		}
	}
	else{
		$data=Options::where('key',$key)->select('value')->first();
	}

	if ($array==true) {
		return json_decode($data->value,true);
	}
	return json_decode($data->value);
}

function Livechat($param)
{
	return Lphelper::TwkChat($param);
}


function mediasingle()
{
  return view('admin.media.mediamodal');
}

function input($array = [])
{
	$title = $array['title'] ?? 'title';
	$type = $array['type'] ?? 'text';
	$placeholder = $array['placeholder'] ?? '';
	$name = $array['name'] ?? 'name';
	$id = $array['id'] ?? '';
	$value = $array['value'] ?? '';
	$min_input = $array['min_input'] ?? '';
	$max_input = $array['max_input'] ?? '';
	$step = $array['step'] ?? '';
	if (isset($array['is_required'])) {
		$required = $array['is_required'];
	}
	else{
		$required = false;
	}
	return view('components.input',compact('title','step','max_input','min_input','type','placeholder','name','id','value','required'));
}

function textarea($array = [])
{
	$title=$array['title'] ?? '';
	$id=$array['id'] ?? '';
	$name=$array['name'] ?? '';
	$placeholder=$array['placeholder'] ?? '';
	$maxlength=$array['maxlength'] ?? '';
	$cols=$array['cols'] ?? 30;
	$rows=$array['rows'] ?? 3;
	$class=$array['class'] ?? '';
	$value=$array['value'] ?? '';
	$is_required=$array['is_required'] ?? false;
	return view('components.textarea',compact('title','placeholder','name','id','value','is_required','class','cols','rows','maxlength'));
}

function editor($array = [])
{
	$title=$array['title'] ?? '';
	$id=$array['id'] ?? 'content';
	$name=$array['name'] ?? '';
	$cols=$array['cols'] ?? 30;
	$rows=$array['rows'] ?? 10;
	$class=$array['class'] ?? '';
	$value=$array['value'] ?? '';

	return view('components.editor',compact('title','name','id','value','class','cols','rows'));
}

function publish($array = [])
{
	$title=$array['title'] ?? 'Publish';
	$button_text=$array['button_text'] ?? 'Save';
	$class=$array['class'] ?? '';
	$id=$array['id'] ?? '';
	return view('components.publish',compact('title','button_text','class','id'));
}

function mediasection($array = [])
{
	$title=$array['title'] ?? 'Image';
	$preview_id=$array['preview_id'] ?? 'preview';
	$preview=$array['preview'] ?? 'admin/img/img/placeholder.png';
	$input_id=$array['input_id'] ?? 'preview_input';
	$input_class=$array['input_class'] ?? 'input_image';
	$input_name=$array['input_name'] ?? 'preview';
	$value=$array['value'] ?? '';
	return view('admin.media.section',compact('title','preview_id','preview','input_id','input_class','input_name','value'));
}

function mediasectionmulti($array = [])
{
	$title=$array['title'] ?? 'Image';
	$preview_id=$array['preview_id'] ?? 'preview';
	$preview=$array['preview'] ?? '';
	$input_id=$array['input_id'] ?? 'preview_input';
	$input_class=$array['input_class'] ?? 'input_image';
	$input_name=$array['input_name'] ?? 'preview';
	$area_id=$array['area_id'] ?? 'gallary-img';
	$value=$array['value'] ?? '';
	return view('admin.media.multisection',compact('title','preview_id','preview','input_id','input_class','input_name','value','area_id'));
}



function mediamulti()
{
	return view('admin.media.multiplemediamodel');
}
/*
return posts array
*/
function LpPosts($arr){

	$type=$arr['type'];
	$relation=$arr['with'] ?? '';
	$order=$arr['order'] ?? 'DESC';
	$limit=$arr['limit'] ?? null;
	$lang=$arr['translate'] ?? true;

	if (!empty($relation)) {
		if (empty($limit)) {
			if ($lang==true) {
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->orderBy('id',$order)->where('lang',Session::get('locale'))->get();

			}
			else{
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->orderBy('id',$order)->where('lang','en')->get();
			}

		}
		else{
			if ($lang==true) {
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->paginate($limit);
			}
			else{
				$data=Terms::with($relation)->where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->paginate($limit);
			}

		}

	}
	else{
		if (empty($limit)) {
			if ($lang==true) {
				$data=Terms::where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->get();
			}
			else {
				$data=Terms::where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->get();

			}


		}
		else{
			if ($lang==true) {
				$data=Terms::where('type',$type)->where('status',1)->where('lang',Session::get('locale'))->orderBy('id',$order)->paginate($limit);
			}
			else {
				$data=Terms::where('type',$type)->where('status',1)->where('lang','en')->orderBy('id',$order)->paginate($limit);


			}

		}
	}

	return $data;
}



/*
return admin category
*/

function  AdminCategory($type)
{
	 return Lphelper::LPAdminCategory($type);
}

/*
return category selected
*/

function AdminCategoryUpdate($type,$arr = []){

	 return Lphelper::LPAdminCategoryUpdate($type,$arr);
}



function theme_asset($path)
{
	return asset($path);
}

function content_format($data){
	return view('components.content',compact('data'));
}


function content($main_id,$id,$get_id=null)
{

	$theme_json_file_get = file_get_contents( base_path().'/am-content/Themes/theme.json');
	$themes = json_decode($theme_json_file_get, true);
	foreach ($themes as $theme) {
		if ($theme['status'] == 'active') {
			$active_theme = $theme['Text Domain'];
		}
	}
	//$active_theme=Session::get('active_theme');

	$customizer = App\Customizer::where([
		['key', $main_id],
		['theme_name', $active_theme],
	])->first();

	if ($customizer) {
		$main_value = json_decode($customizer->value);

		if ($get_id == null) {
			$check_id = json_decode($customizer->value);
			if (isset($check_id->settings->$id)) {

				if (Session::has('locale')) {
					if(Session::get('locale') == 'en'){
						if ($customizer->status == 0) {
							$value = json_decode($customizer->value);
							return $value->settings->$id->old_value;
						}else{
							$value = json_decode($customizer->value);
							return $value->settings->$id->new_value;
						}
					}else{
						if (file_exists(base_path().'/resources/lang/'.Session::get('locale').'.json')) {
						$lang_file = file_get_contents( base_path().'/resources/lang/'.Session::get('locale').'.json');

						}
						else{
						$lang_file = file_get_contents( base_path().'/resources/lang/en.json');

						}
						$lang_data = json_decode($lang_file);

						if (isset($lang_data->$id)) {
							return $lang_data->$id;
						}
					}
				}

				if ($customizer->status == 0) {
					$value = json_decode($customizer->value);
					return $value->settings->$id->old_value;
				}else{
					$value = json_decode($customizer->value);
					return $value->settings->$id->new_value;
				}

			}
		}


		if ($get_id != null) {
			$check_get_id  = json_decode($customizer->value);
			if (isset($check_get_id->content->$get_id->$id)) {

				if (Session::has('locale')) {
					if(Session::get('locale') == 'en')
					{
						if ($customizer->status == 0) {
							$value = json_decode($customizer->value);
							return $value->content->$get_id->$id->old_value;
						}else{
							$value = json_decode($customizer->value);
							return $value->content->$get_id->$id->new_value;
						}
					}else{
						if (file_exists(base_path().'/resources/lang/'.Session::get('locale').'.json')) {
						$lang_file = file_get_contents( base_path().'/resources/lang/'.Session::get('locale').'.json');
						}
						else{
						$lang_file = file_get_contents( base_path().'/resources/lang/en.json');

						}
						$lang_data = json_decode($lang_file);

						if (isset($lang_data->$id)) {
							return $lang_data->$id;
						}
					}

				}

				if ($customizer->status == 0) {
					$value = json_decode($customizer->value);
					return $value->content->$get_id->$id->old_value;
				}else{
					$value = json_decode($customizer->value);
					return $value->content->$get_id->$id->new_value;
				}

			}

		}
	}


}



function GetThemeRoot()
{
	$file = file_get_contents( base_path().'/am-content/Themes/theme.json');
	$themes = json_decode($file, true);
	foreach ($themes as $theme) {
		if ($theme['status'] == 'active') {
			$customizer_file = file_get_contents( base_path().'/am-content/Themes/'.$theme['Text Domain'].'/customizer.json');
			$active_theme = json_decode($customizer_file,true);
			foreach ($active_theme as $key => $value) {
				if ($value['status'] == 'active') {
					$root = base_path().'/am-content/Themes/'.$theme['Text Domain'].'/';
					break;

				}
			}
		}
	}

	$dir= $root ?? "lp";

	return $dir;
}


function put($content,$root)
{
	$content=file_get_contents($content);
	File::put($root,$content);
}


function AdminSidebar()
{
	if(file_exists(base_path().'/am-content/Plugins/menuregister.php')){
      include_once(base_path().'/am-content/Plugins/menuregister.php');
      if(function_exists('RegisterAdminMenuBar')){
      	$dyanmicMenu=RegisterAdminMenuBar();
      }

    }
    return $dyanmicMenu ?? [];


}

function google_analytics(){

}

function id(){
	return "31039172";
}

