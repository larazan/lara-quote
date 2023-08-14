<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categories');
    }
}
