<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements SluggableInterface
{
    use SluggableTrait;
    use SoftDeletes;

    protected $fillable = ['title', 'content_raw', 'content_html', 'thumbnail', 'user_id', 'cate_id', 'deleted_at'];

    protected $sluggable = ['build_from' => 'title', 'save_to' => 'slug'];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * 格式化时间为xxx之前
     * @return mixed
     */
    public function scopeCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * 格式化时间为xxx之前
     * @return mixed
     */
    public function scopeUpdatedAt()
    {
        return $this->updated_at->diffForHumans();
    }

    /**
     * 创建文章时将content_raw转成html存到content_html中
     * @param $contentRaw
     */
    public function setContentRawAttribute($contentRaw)
    {
        $this->attributes['content_html'] = (new Markdown\Parser())->makeHtml($contentRaw);
        $this->attributes['content_raw'] = $contentRaw;
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }

    /**
     * 关键词搜索
     * @param $keyword
     * @return mixed
     */
    public static function Search($keyword)
    {
        return self::where('title', 'like', "%$keyword%")->orWhere('content_html', 'like', "%$keyword%")->paginate(6);
    }

    /**
     * 添加并且创建标签
     * @param array $tags
     */
    public static function attachTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag) {
            if (!is_numeric($tag)) {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->attach($tags);
    }

    /**
     * 更新并且创建标签
     * @param array $tags
     */
    public static function syncTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag) {
            if (!is_numeric($tag)) {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->sync($tags);
    }
}