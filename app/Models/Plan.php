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
        'stripe_product_id',
        'stripe_price_id',
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

    public function stripeProductId()
    {
        return $this->stripe_product_id;
    }

    public function stripePriceId()
    {
        return $this->stripe_price_id;
    }

    public function price()
    {
        return '$' . number_format($this->price, 2);
    }

    public function abbreviation()
    {
        return $this->abbreviation;
    }

}
