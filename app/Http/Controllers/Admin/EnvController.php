<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
class EnvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth()->user()->can('system.settings'))
        {
            abort(401);
        }    
        $countries= base_path('resources/lang/langlist.json');
        $countries= json_decode(file_get_contents($countries),true);

        return view('admin.settings.env',compact('countries'));
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
     
       $APP_NAME = Str::slug($request->APP_NAME);
       $PUSHER_APP_KEY = $request->PUSHER_APP_KEY;
       $PUSHER_APP_CLUSTER = $request->PUSHER_APP_CLUSTER;
$txt ="APP_NAME=".$APP_NAME."
APP_ENV=".$request->APP_ENV."
APP_KEY=base64:kZN2g9Tg6+mi1YNc+sSiZAO2ljlQBfLC3ByJLhLAUVc=
APP_DEBUG=".$request->APP_DEBUG."
APP_URL=".$request->APP_URL."
LOG_CHANNEL=".$request->LOG_CHANNEL."


DB_CONNECTION=".env("DB_CONNECTION")."
DB_HOST=".env("DB_HOST")."
DB_PORT=".env("DB_PORT")."
DB_DATABASE=".env("DB_DATABASE")."
DB_USERNAME=".env("DB_USERNAME")."
DB_PASSWORD=".env("DB_PASSWORD")."


BROADCAST_DRIVER=".$request->BROADCAST_DRIVER."
CACHE_DRIVER=".$request->CACHE_DRIVER."
QUEUE_CONNECTION=".$request->QUEUE_CONNECTION."
SESSION_DRIVER=".$request->SESSION_DRIVER."
SESSION_LIFETIME=".$request->SESSION_LIFETIME."

REDIS_HOST=".$request->REDIS_HOST."
REDIS_PASSWORD=".$request->REDIS_PASSWORD."
REDIS_PORT=".$request->REDIS_PORT."


MAIL_MAILER=".$request->MAIL_MAILER."
MAIL_HOST=".$request->MAIL_HOST."
MAIL_PORT=".$request->MAIL_PORT."
MAIL_USERNAME=".$request->MAIL_USERNAME."
MAIL_PASSWORD=".$request->MAIL_PASSWORD."
MAIL_ENCRYPTION=".$request->MAIL_ENCRYPTION."
MAIL_FROM_ADDRESS=".$request->MAIL_FROM_ADDRESS."
MAIL_TO=".$request->MAIL_TO."
MAIL_FROM_NAME=".Str::slug($request->MAIL_FROM_NAME)."

DO_SPACES_KEY=".$request->DO_SPACES_KEY."
DO_SPACES_SECRET=".$request->DO_SPACES_SECRET."
DO_SPACES_ENDPOINT=".$request->DO_SPACES_ENDPOINT."
DO_SPACES_REGION=".$request->DO_SPACES_REGION."
DO_SPACES_BUCKET=".$request->DO_SPACES_BUCKET."

ANALYTICS_VIEW_ID=".$request->ANALYTICS_VIEW_ID.""."
GA_MEASUREMENT_ID=".$request->GA_MEASUREMENT_ID.""."
GOOGLE_API_KEY=".$request->GOOGLE_API_KEY.""."

FACEBOOK_CLIENT_ID=".$request->FACEBOOK_CLIENT_ID.""."
FACEBOOK_CLIENT_SECRET=".$request->FACEBOOK_CLIENT_SECRET.""."

GOOGLE_CLIENT_ID=".$request->GOOGLE_CLIENT_ID.""."
GOOGLE_CLIENT_SECRET=".$request->GOOGLE_CLIENT_SECRET.""."

NOCAPTCHA_SITEKEY=".$request->NOCAPTCHA_SITEKEY.""."
NOCAPTCHA_SECRET=".$request->NOCAPTCHA_SECRET.""."

TIMEZONE=".$request->TIMEZONE.""."
DEFAULT_LANG=".$request->DEFAULT_LANG."\n


MAILCHIMP_DRIVER=".$request->MAILCHIMP_DRIVER."
MAILCHIMP_APIKEY=".$request->MAILCHIMP_APIKEY."
MAILCHIMP_LIST_ID=".$request->MAILCHIMP_LIST_ID."
";
       File::put(base_path('.env'),$txt);
       return response()->json("System Updated");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
