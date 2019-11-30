<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
      'category_id',
      'photo_id',
      'title',
      'body'


    ];

    //post has one user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //post has one category
    public  function category()
    {
        return $this->belongsTo('App\Category');
    }

    //post has one photo

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
