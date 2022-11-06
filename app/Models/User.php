<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use DB;
use App\Terms;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getpermissionGroups()
    {
        $permission_groups = DB::table('permissions')
        ->select('group_name as name')
        ->groupBy('group_name')
        ->get();
        return $permission_groups;
    }

    public static function getPermissionGroup()
    {
        return $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    }
    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
        ->select('name', 'id')
        ->where('group_name', $group_name)
        ->get();
        return $permissions;
    }

    public function term()
    {
        return $this->hasMany('App\Terms', 'use_id', 'id');
    }
    public function terms()
    {
        return $this->hasMany('App\Terms');
    }

    public function user_session(){
        return $this->hasOne('App\Models\Session')->select('user_id','ip_address','last_activity');
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    public function usermeta()
    {
        return $this->hasOne('App\Usermeta')->where('type','content');
    }

    public function credit()
    {
        return $this->hasOne('App\Usermeta')->where('type','credit');
    }

    public function property()
    {
        return $this->hasMany('App\Terms','user_id','id')->where('type','property')->whereHas('min_price')->whereHas('max_price')->wherehas('post_city')->with('post_preview','min_price','max_price','post_city','post_state','user','featured_option');
    }

    public function favourite_properties()
    {
        return $this->belongsToMany('App\Terms')->withTimestamps()->with('post_city','property_type');
    }

    public function agency()
    {
        return $this->hasOne('App\Category')->where('type','agency');
    }

    public function agencyPackage()
    {
        return $this->terms->where('type','agency_package');
    }
}
