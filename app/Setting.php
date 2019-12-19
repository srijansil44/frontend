<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'website_title','website_sub_title','number','email','address','web_meta_tag','web_description','web_author'
    ];
}
