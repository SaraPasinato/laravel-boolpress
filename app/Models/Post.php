<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    protected $fillable =['title','content','slug','image','category_id','user_id'];

    public function getFormattedDate($column,$format='d-m-Y')
    {
        return  Carbon::create($this->$column)->format($format);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
