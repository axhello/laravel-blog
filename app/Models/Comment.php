<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['username', 'email', 'website', 'content', 'article_id'];

    public function articles()
    {
        return $this->belongsTo(Article::class,'article_id');
    }

    /**
     * 格式化时间为xxx之前
     * @return mixed
     */
    public function scopeCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }
}
