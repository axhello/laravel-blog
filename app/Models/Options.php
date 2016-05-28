<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $fillable = ['author', 'title', 'siteUrl', 'description', 'keywords', 'twitter', 'weibo', 'steam', 'github', 'email'];

    /**
     * 取到Options第一条数据
     * @return mixed
     */
    public function getFirstData()
    {
        return self::first();
    }

    /**
     * 取到站点标题
     * @return mixed
     */
    public function title()
    {
        return $this->getFirstData()->title;
    }

    /**
     * 取到站点作者
     * @return mixed
     */
    public function author()
    {
        return $this->getFirstData()->author;
    }

    /**
     * 取到站点描述
     * @return mixed
     */
    public function descriptions()
    {
        return $this->getFirstData()->description;
    }

    /**
     * 取到站点关键词
     * @return mixed
     */
    public function keywords()
    {
        return $this->getFirstData()->keywords;
    }

}
