<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;
class MailchimpController extends Controller
{
    public function subscribe(Request $request)
    {
    	Newsletter::subscribe($request->email);
    	return response()->json(['Thank You For Subscribe']);
    }

    public function unsubscribe(Request $request)
    {
    	Newsletter::unsubscribe($request->email);
    	return response()->json(['Successfully Unsubscribe']);
    }
}
