<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','tel','sehir','ulke','username','durum','notlar','kod'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getKod()
    {
        return $this->kod;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role',"role_user");
    }

    public function yetkisi_var_mi($yetki)
    {
        foreach($this->roles()->get() as $role)
        {
            if($role->name == $yetki)
            {
                return true;
                break;
            }
        }
        return false;
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }
    public function pays(){
        return $this->hasMany('App\Pay');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
}
