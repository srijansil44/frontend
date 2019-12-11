<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;



class Post extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,


            ]
        ];
    }
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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceHolder()
    {
        return 'https://via.placeholder.com/300.png/09f/fff' ;
    }
}
