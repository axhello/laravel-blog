<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'sort'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'cate_id');
    }

    /**
     * @return mixed
     */
    public static function getCategoryArray()
    {
        return self::lists('name', 'id');
    }

}
