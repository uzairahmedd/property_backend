<?php

namespace Amcoders\Theme\jomidar\http\controllers\Agent;

use App\Media;
use App\Meta;
use App\Models\Mediapost;
use App\Options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Terms;
use Hash;
use Image;
use App\Usermeta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 *
 */
class ProfileController extends controller
{
    protected $filename;
    protected $fullname;

    public function index()
    {
        $property_count = Terms::where('type', 'property')->where('status', 1)->where('user_id', Auth::id())->count();
        $favorite_property = Auth::User()->user_favourite_properties()->count();
        return view('theme::newlayouts.user_dashboard.profile', compact('property_count', 'favorite_property'));
        // return view('view::agent.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::User();
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()[0]]);
        }

        if ($request->current_password) {
            $validator = \Validator::make($request->all(), [
                'current_password' => 'password',
                'password' => 'required|confirmed'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()[0]]);
            }

            $user->password = Hash::make($request->password);
        }



        $user->name = $request->name;
        $str_slug = Str::slug($request->name);
        $slug_check = User::where('slug', $str_slug)->first();
        if ($slug_check) {
            $slug = $str_slug . Str::random(5);
        } else {
            $slug = $str_slug;
        }
        $user->slug = $slug;
        $user->email = $request->email;
        $user->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license
        ];

        $usermeta = Usermeta::where([
            ['user_id', $user->id],
            ['type', 'content']
        ])->first();
        if (empty($usermeta)) {
            $usermeta = new Usermeta();
            $usermeta->user_id = $user->id;
            $usermeta->type = 'content';
        }

        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Settings Updated');
    }

    public function viewProfile()
    {
        $info = User::where('id', Auth::id())->first();
        return success_response(['imageName' => $info->avatar, 'Image get successfully']);
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
            $result['data'] = $this->create($image, $im_name, $im_type, $im_size, $c_type, $level);

            if ($c_type == 'gif' || $c_type == 'png') {
                if (file_exists($image)) {
                    unlink($image);
                }
            }
            return $result;
        }
    }

    private function create($image, $name, $type, $size, $c_type, $level)
    {
        $im_name = $this->fullname;
        $path = 'uploads/' . date('y') . '/' . date('m') . '/';
        $im_output = $path . $im_name;
        $im_ex = explode('.', $im_output); // get file extension

        // create image
        if ($type == 'image/jpeg') {
            $im = imagecreatefromjpeg($image); // create image from jpeg

        } elseif ($type == 'image/png' || $type == 'image/PNG') {
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

    public function profile_img(Request $request)
    {

        $user_id = Auth::User()->id;
        $validator = \Validator::make($request->all(), [
            'image' => 'mimes:jpeg,jpg,png|max:20480',
        ]);
        if ($validator->fails()) {
            return error_response($validator->errors(), 'Validation error');
        }

        $info = Options::where('key', 'lp_filesystem')->first();
        $info = json_decode($info->value);


        $imageSizes = json_decode(imageSizes());

        if ($request->hasfile('image')) {
            $image = $request->file('image');
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
                $user = User::where('id', $user_id)->update([
                    'avatar' => $fileUrl
                ]);
            }
            return success_response(['imageName' => $fileUrl, 'Image Uploaded successfully']);
        }
    }
}
