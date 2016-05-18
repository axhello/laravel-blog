<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ['title', 'slug', 'content_raw', 'content_html'];

    /**
     * 创建文章时将content_raw转成html存到数据库中
     * @param $contentRaw
     */
    public function setContentRawAttribute($contentRaw)
    {
        $this->attributes['content_html'] = (new Markdown\Parser())->makeHtml($contentRaw);
        $this->attributes['content_raw'] = $contentRaw;
    }
}
