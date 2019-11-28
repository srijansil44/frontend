<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['path'];
    protected  $directory = '/images/';



    //using accessors , so that while echoing the /images/ is also echo so that we can see the photos

    public function getPathAttribute($photo)
    {


        return $this->directory . $photo;
    }
}
