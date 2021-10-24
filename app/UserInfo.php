<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable =['user_id','address','phone','country'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
