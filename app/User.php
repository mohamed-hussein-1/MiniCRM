<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','invitation-code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }
    /*returns customers assigned by this user */
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    /**
     * actions performed by this user
     */
    public function customersWithActions()
    {
        return $this->belongsToMany('App\Customer','actions' , 'user_id' , 'customer_id')->withPivot('type','description')->withTimestamps();
    }
}
