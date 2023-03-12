<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDistrict extends Model
{
    use HasFactory;
    protected $table="post_district";
    public $timestamps = false;

    public function district()
	{
		return $this->hasOne('App\Models\District','id','district_id')->select('id','name','ar_name','slug');
	}

}
