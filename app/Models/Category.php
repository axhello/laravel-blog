<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','sort'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'cate_id');
    }

    public static function getCategoryAll()
    {
        return self::all();
    }

    public static function getCategoryArray()
    {
        return self::lists('name', 'id');
    }

}
