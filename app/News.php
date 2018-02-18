<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;


class News extends Model
{
    protected $fillable = [
      'news_author', 'news_title', 'news_content','news_thumbnail', 'news_status'
    ];

    public function categories() {
      return $this->belongsToMany('App\Category');
    }

    public function user(){
      return $this->hasOne('App\User');;
    }
}
