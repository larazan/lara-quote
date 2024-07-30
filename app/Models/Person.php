<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Person extends Model
{
    use HasFactory;
    use Searchable;

	protected $table = 'persons';

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public function toSearchableArray(): array
    {
        return [
            // 'id' => $this->id(),
            // 'author_id' => $this->author_id(),
            'name' => $this->name(),
            'slug' => $this->slug(),
            // 'bio' => $this->bio(),
        ];
    }
}
