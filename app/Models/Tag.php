<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public static function getTagArray()
    {
        return self::lists('name', 'id');
    }
}
