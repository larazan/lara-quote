<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    const TABLE = 'plans';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'slug',
        'stripe_name',
        'stripe_id',
        'price',
        'abbreviation',
        'features',
        'type',
    ];

    protected $casts = [
        'price' => PriceCast::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function slug()
    {
        return $this->slug;
    }

    public function stripeName()
    {
        return $this->stripe_name;
    }

    public function stripeId()
    {
        return $this->stripe_id;
    }

    public function price()
    {
        return '$' . $this->price;
    }

    public function abbreviation()
    {
        return $this->abbreviation;
    }

}
