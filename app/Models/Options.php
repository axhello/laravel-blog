<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $fillable = [
        'author',
        'title',
        'siteUrl',
        'description',
        'keywords',
        'twitter',
        'weibo',
        'steam',
        'github',
        'email'
    ];
}
