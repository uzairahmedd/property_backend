<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediapost extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function media()
    {
    	return $this->belongsTo('App\Media')->select('id','url');
    }
}
