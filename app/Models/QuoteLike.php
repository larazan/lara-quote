<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteLike extends Model
{
    use HasFactory;

    protected $table = 'quote_likes';

    protected $fillable = [
        'user_id',
        // 'quote_id',
        'ip',
        'user_agent',
    ];

    public function scopeForPost($query, Quote $quote)
    {
        return $query->where('quote_id', $quote->id);
    }

    public function scopeForIp($query, string $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeForUserAgent($query, string $userAgent)
    {
        return $query->where('user_agent', $userAgent);
    }
}
