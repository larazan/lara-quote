<?php

namespace App\Models;

use App\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public $timestamps = false;
    public const ACTIVE = 'active';

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
            // ->where('article_type', self::POST)
            // ->where('published_at', '<=', Carbon::now());
    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('slug', '!=', 'laravelio');
    }

    public function isAnnouncement(): bool
    {
        return $this->slug === 'laravelio';
    }
}
