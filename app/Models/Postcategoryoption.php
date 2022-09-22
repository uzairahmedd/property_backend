<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcategoryoption extends Model
{
	use HasFactory;
	public $timestamps = false;

	public function category()
	{
		return $this->hasOne('App\Category','id','category_id')->select('id','name','slug')->with('icon');
	}

	public function featured_category()
	{
		return $this->hasOne('App\Category','id','category_id')->where('type','option')->where('featured',1)->with('preview')->take(3);
	}
}
