<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class News extends Model
{
    protected $fillable = [
      'user_id', 'title', 'text,'
    ];

    public function categories() {
      return $this->belongsToMany('App\Category');
    }
}
