<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public const UPLOAD_DIR = 'uploads/articles';

    public const SMALL = '135x141';
	public const MEDIUM = '312x400';
	public const LARGE = '1000x600';

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public const STATUSES = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    public static function statuses()
	{
		return self::STATUSES;
	}

    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryArticles()
    {
        return $this->belongsToMany('App\Models\CategoryArticle', 'article_categories');
    }

    public function scopePublished($query, $published = true)
    {
        return $query->where('published', $published);
    }

    public function scopeForTag(Builder $query, string $tag): Builder
    {
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }
}
