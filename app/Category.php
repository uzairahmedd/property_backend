<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $table="categories";
	
	public function posts()
	{
       return $this->belongsToMany('App\Terms','post_category','category_id','term_id');
	}

	public function child()
	{
       return $this->belongsToMany(Category::class,'categoryrelations','parent_id','child_id');
	}

	public function parent()
	{
       return $this->belongsToMany(Category::class,'categoryrelations','child_id','parent_id');
	}


	public function categories()
	{
		return $this->hasMany(Category::class,'p_id','id');
	}

	public function childrenCategories()
	{
		return $this->hasMany(Category::class,'p_id','id')->with('categories');
	}


	public function user()
	{
		return $this->hasOne('App\Models\User','id','user_id');
	}

	public function preview()
	{
		return $this->hasOne('App\Categorymeta')->where('type','preview')->select('category_id','content');
	}
	public function credintial()
	{
		return $this->hasOne('App\Categorymeta')->where('type','credentials')->select('category_id','content');
	}
	
	public function map()
	{
		return $this->hasOne('App\Categorymeta')->where('type','mapinfo')->select('category_id','content');
	}

	public function icon()
	{
		return $this->hasOne('App\Categorymeta')->where('type','icon')->select('category_id','content');
	}

	public function creditcharge()
	{
		return $this->hasOne('App\Categorymeta')->where('type','credit_charge')->select('category_id','content');
	}
	public function excerpt()
	{
		return $this->hasOne('App\Categorymeta')->where('type','excerpt')->select('category_id','content');
	}

	public function position()
	{
		return $this->hasOne('App\Categorymeta')->where('type','position')->select('category_id','content');
	}


	public function address()
	{
		return $this->hasMany('App\Models\Postcategoryoption');
	}

	public function post_category_option()
	{
		return $this->hasOne('App\Models\Postcategoryoption')->where('type','options');
	}

	public function agency()
	{
		return $this->hasMany('App\Models\Categoryuser','category_id','id')->with('user');
	}

	public function users()
	{
		return $this->belongsToMany('App\Models\User','categoryusers','category_id','user_id');
		
	}

	public function categoryuser()
	{
		return $this->hasMany('App\Models\Categoryuser');
		
	}
	

	public function agency_lists()
	{
		return $this->hasMany('App\Models\Categoryuser','category_id','id')->with('user');
	}

	public function categorymeta()
    {
        return $this->hasOne('App\Categorymeta')->where('type','content');
    }

    public function credit()
    {
        return $this->hasOne('App\Categorymeta')->where('type','credit');
	}

	public function langmeta()
    {
        return $this->hasOne('App\Categorymeta')->where('type','lang');
	}
	
	
}
