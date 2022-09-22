<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;
use Artisan;
use Auth;
class BackupController extends Controller
{
    public function index()
    {
        if (!Auth()->user()->can('backup')) {
            abort(401);
        }

        $name = env('APP_NAME');
        $dir = base_path('storage/app/'.$name);
        if (file_exists($dir)) {
           $file_lists = scandir($dir);
        }
        else{
             $file_lists = [];
        }
        
        return view('admin.backup.index',compact('file_lists'));
    }

    public function backup()
    {
        ini_set('max_execution_time', '0');
        Artisan::call('backup:run');
        return response()->json('ok');
    }

    public function delete($file)
    {
        $name = env('APP_NAME');
        $dir = base_path('storage/app/'.$name.'/'.$file);
        unlink($dir);

        return back();
    }

    public function download($file)
    {
        $name = env('APP_NAME');
        return response()->download(storage_path('app/'.$name.'/'.$file));
    }
}
