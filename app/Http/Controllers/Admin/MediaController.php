<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Media;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use App\Options;
use Illuminate\Support\Str;
use Validator,Response;
use ArtisansWeb\Optimizer;
use Auth;
use App\Models\User;
use App\Userplan;
use App\Models\Mediapost;
class MediaController extends Controller
{

    protected $filename;
    protected $ext;
    protected $fullname;

    public function __construct()
    {
       $this->middleware('auth');;
    }

    public function bulk_upload()
    {
        if (!Auth()->user()->can('media.upload')) {
            abort(401);
        }
        return view('admin.media.create'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth()->user()->can('media.list')) {
            abort(401);
        } 
       
        $medias=Media::latest()->paginate(30);  
        $src=$request->src ?? '';
        return view('admin.media.index',compact('medias','src'));
      
        
    }

    public function json(Request $request){
           
        $row=Media::latest()->select('id','name','url')->paginate(12);
        return response()->json($row);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
   
     request()->validate([
        'media.*' => 'required'

      ]);
     
     $auth_id=Auth::id();
     
   
        $info=Options::where('key','lp_filesystem')->first();
        $info=json_decode($info->value);
        
       
        $imageSizes= json_decode(imageSizes());

        if($request->hasfile('media'))
        {
            foreach($request->file('media') as $image)
            {

                $name = uniqid().date('dmy').time(). "." . $image->getClientOriginalExtension();
                $ext= $image->getClientOriginalExtension();

                
                
                $this->fullname=date('dmy').time().uniqid().'.'.$image->getClientOriginalExtension();

                $path='uploads/'.date('y').'/'.date('m').'/';
                
               
                if(substr($image->getMimeType(), 0, 5) == 'image' &&  $ext != 'ico') {
                  
                  $image->move($path, $name); 
                  $compress= $this->run($path.$name,$ext,$info->compress); 

                  if (file_exists($path.$name) ) {
                    if (!in_array(strtolower($ext), array('png','gif'))) {
                      
                         unlink($path.$name);
                    }
                   
                  }
                   
                if ($info->system_type=='do') {
                    $file=asset($compress['data']['image']);

                    $upload= Storage::disk('do')->putFileAs(date('Ym'), $file, $compress['data']['name'] ,'public');
                    
                    $fileUrl=$info->system_url.'/'.$upload;

                    
                     $newpath=date('Ym');
                     $filename=$compress['data']['name'];

                     
                     $imgArr=explode('.', $compress['data']['name']);
                     


                     foreach ($imageSizes as $size) {
                      $img=Image::make($compress['data']['image']);
                      $img->fit($size->width,$size->height);
                      $moved= $img->save('uploads/'.date('y').'/'.date('m').'/'.$imgArr[0].$size->key.'.'.$imgArr[1]);

                      $resizeIMG=asset('uploads/'.date('y').'/'.date('m').'/'.$imgArr[0].$size->key.'.'.$imgArr[1]);

                       Storage::disk('do')->putFileAs(date('Ym'), $resizeIMG, $imgArr[0].$size->key.'.'.$imgArr[1] ,'public');
                       if (file_exists('uploads/'.date('y').'/'.date('m').'/'.$imgArr[0].$size->key.'.'.$imgArr[1])) {
                            unlink('uploads/'.date('y').'/'.date('m').'/'.$imgArr[0].$size->key.'.'.$imgArr[1]);
                       }
                     
                     }

                     if (file_exists($compress['data']['image'])) {
                         unlink($compress['data']['image']);
                     }
                     
                }

                else{
                    $schemeurl=parse_url(url('/'));
                    if ($schemeurl['scheme']=='https') {
                       $url=substr(url('/'), 6);
                    }
                    else{
                         $url=substr(url('/'), 5);
                    }

                    $fileUrl=$url.'/'.$compress['data']['image'];
                    $newpath=$path;
                    $filename=$compress['data']['image'];
                    $imgArr=explode('.', $compress['data']['image']);
                     if (file_exists($compress['data']['image'])) {
                     foreach ($imageSizes as $size) {
                       
                           $img=Image::make($compress['data']['image']);
                           $img->fit($size->width,$size->height);
                           
                           $img->save($imgArr[0].$size->key.'.'.$imgArr[1]);
                        }
                       
                     }
                }

                $media=new Media;
                $media->name=$filename;
                $media->url=$fileUrl;
                $media->type=$ext;
                $media->path=$newpath;
                $media->user_id=$auth_id;
                $media->size=$compress['data']['size'].'kib';
                $media->save();
                $data = $media;  

            }
            else{
                request()->validate([
                 'media.*' => 'required||mimes:doc,docx,txt,pdf,xlsx,ico|max:2024'

                ]);
                 if ($info->system_type=='do') {
                    $file=uniqid().$image;
                    $upload= Storage::disk('do')->putFileAs(date('Ym'), $file, $name ,'public');
                    $fileUrl=$info->system_url.date('Ym').'/'.$upload;
                    $newpath=date('Ym');
                    
                }
                else{
                    $name = uniqid().time().".".$image->getClientOriginalExtension();
                    $ext= $image->getClientOriginalExtension();
                    $path='uploads/'.date('y').'/'.date('m').'/';
                    $image->move($path, $name); 

                    $schemeurl=parse_url(url('/'));
                    if ($schemeurl['scheme']=='https') {
                       $url=substr(url('/'), 6);
                    }
                    else{
                         $url=substr(url('/'), 5);
                    }
                    $fileUrl=$url.'/'.$path.$name;
                    $newpath=$path;


                }
                
                $media=new Media;
                $media->name=$fileUrl;
                $media->url=$fileUrl;
                $media->type=$ext;
                $media->size='unknown';
                $media->path=$newpath;
                $media->user_id=$auth_id;
                $media->save();
                $data = $media; 
                

            }
                      
               
            }

            if ($request->term_id) {
                $mediapost=new Mediapost;
                $mediapost->term_id =$request->term_id;
                $mediapost->media_id =$data->id;
                $mediapost->save();
            }
            return response($data);
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media=Media::find($id);
        return response()->json($media);
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     
     
      if ($request->status=='delete') {
         
        $info=Options::where('key','lp_filesystem')->first();
        $info=json_decode($info->value);

        
        $imageSizes= json_decode(imageSizes());
        if (Auth::user()->role_id !== 1) {
         $check=true;
         $user_id=Auth::id();
         }
         else{
            $check=false;
         }   
        if ($request->id) {
            foreach ($request->id as $id) {
                if ($check==true) {
                   $media=Media::where('user_id',$user_id)->findorFail($id);
                }
                else{
                   $media=Media::find($id);
                }
                
                if ($info->system_type=='do') {
                 
                  $check=  Storage::disk('do')->delete($media->path.'/'.$media->name);
                    foreach ($imageSizes as $size) {
                        $imgArr=explode('.', $media->name);
                       
                      $check=  Storage::disk('do')->delete($media->path.'/'.$imgArr[0].$size->key.'.'.$imgArr[1]); 
                     }
                }
                else{
                    $file=$media->name;
                   
                   if (file_exists($file)) {
                  
                     unlink($file);
                     foreach ($imageSizes as $size) {
                        $img=explode('.', $file);
                        if (file_exists($img[0].$size->key.'.'.$img[1])) {
                           unlink($img[0].$size->key.'.'.$img[1]);
                        }
                         
                     }
                 }
                
             }

             Media::destroy($id);
           
               
           }
       }



     }
       
      
       return response()->json('Delete Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function post_media_destroy($ids)
    {
     
     
      
         
        $info=Options::where('key','lp_filesystem')->first();
        $info=json_decode($info->value);

        
        $imageSizes= json_decode(imageSizes());
         
        
            foreach ($ids as $id) {
               $media=Media::find($id);
                
                if ($info->system_type=='do') {
                 
                  $check=  Storage::disk('do')->delete($media->path.'/'.$media->name);
                    foreach ($imageSizes as $size) {
                        $imgArr=explode('.', $media->name);
                       
                      $check=  Storage::disk('do')->delete($media->path.'/'.$imgArr[0].$size->key.'.'.$imgArr[1]); 
                     }
                }
                else{
                    $file=$media->name;
                   
                   if (file_exists($file)) {
                  
                     unlink($file);
                     foreach ($imageSizes as $size) {
                        $img=explode('.', $file);
                        if (file_exists($img[0].$size->key.'.'.$img[1])) {
                           unlink($img[0].$size->key.'.'.$img[1]);
                        }
                         
                     }
                 }
                
             }

             Media::destroy($id);
           
               
           }
    
       return response()->json('Delete Success');
    }

   








    private function create($image, $name, $type, $size, $c_type, $level) {
        $im_name = $this->fullname;
        $path='uploads/'.date('y').'/'.date('m').'/';
        $im_output = $path.$im_name;
        $im_ex = explode('.', $im_output); // get file extension
        
        // create image
        if($type == 'image/jpeg'){
            $im = imagecreatefromjpeg($image); // create image from jpeg
            
        }
        elseif($type == 'image/png'){
            $im=imagecreatefrompng($image);
           
        }
        elseif ($type == 'image/gif') {
           $im=imagecreatefromgif($image);
           
        }
       
        // compree image
        if($c_type){
            $im_name = str_replace(end($im_ex),$c_type, $im_name); // replace file extension
            if ($c_type != 'gif') {
                 $im_output = str_replace(end($im_ex), 'webp', $im_output); // replace file extension
               if(!empty($level)){
                    imagewebp($im, $im_output, 100 - ($level * 10)); // if level = 2 then quality = 80%
                }else{
                    imagewebp($im, $im_output, 100); // default quality = 100% (no compression)
                }
                $im_type = 'image/webp';
                // image destroy
                imagedestroy($im);

            }
            else{

                if(!empty($level)){
                    imagegif($im, $im_output, 100 - ($level * 10));
                    
                }else{
                    imagegif($im, $im_output, 100 - ($level * 10));
                }
                $im_type = $type;
                // image destroy
                imagedestroy($im);
                 
            }

            $im_output = str_replace(end($im_ex), $c_type, $im_output); // replace file extension
           
          
            
        }
        else{
           
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

    private function check_transparent($im) {

        $width = imagesx($im); // Get the width of the image
        $height = imagesy($im); // Get the height of the image

        // We run the image pixel by pixel and as soon as we find a transparent pixel we stop and return true.
        for($i = 0; $i < $width; $i++) {
            for($j = 0; $j < $height; $j++) {
                $rgba = imagecolorat($im, $i, $j);
                if(($rgba & 0x7F000000) >> 24) {
                    return true;
                }
            }
        }

        // If we dont find any pixel the function will return false.
        return false;
    }  
    
    function run($image, $c_type, $level = 0) {

        // get file info
        $im_info = getImageSize($image);
        $im_name = basename($image);
        $im_type = $im_info['mime'];
        $im_size = filesize($image);
        
        // result
        $result = array();
        
        // cek & ricek
        if(in_array($c_type, array('jpeg','jpg','JPG','JPEG','gif','GIF','png','PNG'))) { // jpeg, png, gif only
            $result['data'] = $this->create($image, $im_name, $im_type, $im_size, $c_type, $level);

            if ($c_type=='gif' || $c_type=='png') {
                if (file_exists($image)) {
                    unlink($image);
                }
            }   
            return $result;
            
        }
    }

 }   
