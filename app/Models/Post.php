<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    protected $fillable =['title','content','slug','image'];

    public function getFormattedDate($column,$format='d-m-Y')
    {
        return  Carbon::create($this->$column)->format($format);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
