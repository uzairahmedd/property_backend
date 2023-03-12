<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCity extends Model
{
    use HasFactory;
    protected $table="post_city";
	protected $fillable = [
		'term_id','city_id'
	];
	public $timestamps = false;

	public function city()
	{
		return $this->hasOne('App\Models\City','id','city_id')->select('id','name','ar_name','slug');
	}
}
