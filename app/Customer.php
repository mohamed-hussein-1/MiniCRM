<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function employeesWithActions()
    {
        return $this->belongsToMany('App\User','actions' , 'customer_id' , 'user_id')->withPivot('type','description')->withTimestamps();
    }
}
