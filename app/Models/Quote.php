<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public function person()
	{
		return $this->belongsTo(Person::class);
	} 

	public function author($authorId)
	{
		$person = Person::where('author_id', $authorId)->first();
		return $person;
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
}
