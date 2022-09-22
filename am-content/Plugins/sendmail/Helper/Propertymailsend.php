<?php 

namespace Amcoders\Plugin\sendmail\Helper;
use Illuminate\Support\Facades\Mail;
use Amcoders\Plugin\sendmail\Mail\PropertyMail;

class Propertymailsend 
{
	public static function send($name,$email,$message,$agent_email)
	{
		$data = [
			'name' => $name,
			'email' => $email,
			'message' => $message
		];
		Mail::to($agent_email)->send(new PropertyMail($data));
		return response()->json(['Mail Sent Success']);
	}
}