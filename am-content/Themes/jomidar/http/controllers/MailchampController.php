<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Newsletter;

/**
 * 
 */
class MailchampController extends controller
{
    public function store(Request $request)
    {
        Newsletter::subscribe($request->email);

        return response()->json('success');
    }
}