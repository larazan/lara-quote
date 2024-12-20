<?php

namespace App\Models;

use App\Traits\HasLikes;
use App\Traits\HasReplies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quote extends Model
{
    use HasFactory;
    use Searchable;
    use HasUuids;
    use HasReplies;
    use HasLikes;

    const TABLE = 'quotes';

    protected $table = self::TABLE;

    protected $fillable = [
		'words',
		'slug',
		'author_id',
		'tags',
        'status',
	];

    protected $withCount = [
        'likes',
        // 'likesRelation'
    ];

    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

     /**
     * Kita override getIncrementing method
     *
     * Menonaktifkan auto increment
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Kita override getKeyType method
     *
     * Memberi tahu laravel bahwa model ini menggunakan primary key bertipe string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function words(): string
    {
        return $this->words;
    }

	public function person()
	{
		return $this->belongsTo(Person::class);
	} 

	public function author($authorId)
	{
		$person = Person::where('author_id', $authorId)->first();
		return $person;
	}

    public function wordsCount()
    {
        return str_word_count($this->words());
        // 1080 x 1350 (4:5 ratio)
    }

	public function scopeNotPosted(Builder $query): Builder
    {
        return $query->whereNull('posted_at');
    }

	public static function nextForSharing(): ?self
    {
        return self::notPosted()
            ->orderBy('id', 'asc')
            ->first();
    }

	public function markAsPosted()
    {
        $this->update([
            'posted_at' => now(),
        ]);
    }

	public function toSearchableArray(): array
    {
        return [
            'id' => $this->id(),
            // 'author_id' => $this->author_id(),
            'words' => $this->words(),
            // 'slug' => $this->slug(),
            'tags' => $this->tags(),
        ];
    }

    public function replyAbleSubject(): string
    {
        return $this->words();
    }

    public function isLiked()
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();
        if (auth()->user()) {
            // return auth()->user()->likes()->forPost($this)->count();
            return User::with('likes')->whereHas('likes', function ($q) {
                $q->where('quote_id', $this->id);
            })->count();
        }

        if ($ip && $userAgent) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->count();
        }

        return false;
    }

    public function removeLike()
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();
        if (auth()->user()) {
            // return auth()->user()->likes()->forPost($this)->delete();
            return $this->likes()->where('user_id', auth()->user()->id)->where('quote_id', $this->id)->delete();
        }

        if ($ip && $userAgent) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->delete();
        }

        return false;
    }

    public function likes(): HasMany
    {
        return $this->hasMany(QuoteLike::class);
    }

}
