<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;

use function Illuminate\Events\queueable;

class User extends Authenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    const TABLE = 'users';

    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'line1',
        'line2',
        'city',
        'state',
        'country',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function fullName(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function firstName(): string
    {
        return $this->first_name;
    }

    public function lastName(): string
    {
        return $this->last_name;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }

    public function lineOne(): ?string
    {
        return $this->line1;
    }

    public function lineTwo(): ?string
    {
        return $this->line2;
    }

    public function city(): ?string
    {
        return $this->city;
    }    

    public function state(): ?string
    {
        return $this->state;
    }

    public function country(): ?string
    {
        return $this->country;
    }

    public function postalCode(): ?string
    {
        return $this->postal_code;
    }

    public function createdAt()
    {
        return $this->created_at;
    }

    public function username(): string
    {
        // return $this->first_name;
        return $this->username ? $this->username : $this->first_name.' '.$this->last_name;
    }

    public function isBanned(): bool
    {
        return ! is_null($this->banned_at);
    }

    public function hasPassword(): bool
    {
        $password = $this->getAuthPassword();

        return $password !== '' && $password !== null;
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class, 'author_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function generateUserName($username)
    {
        if ($username === null) {
            $username = Str::lower(Str::random(8));
        }

        if (User::where('username', $username)->exist()) {
            $newUsername = $username.Str::lower(Str::random(3));
            $username = self::generateuserName($newUsername);
        }

        return $username;
    }

    // Reply
    public function replies()
    {
        return $this->replyAble;
    }

    public function latestReplies(int $amount = 10)
    {
        return $this->replyAble()->latest()->limit($amount)->get();
    }

    public function deleteReplies()
    {
        foreach ($this->replyAble()->get() as $reply) {
            $reply->delete();
        }
    }

    public function countReplies(): int
    {
        return $this->replyAble()->count();
    }

    public function replyAble(): HasMany
    {
        return $this->hasMany(Reply::class, 'author_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(QuoteLike::class);
    }

    protected static function booted()
    {
        static::updated(queueable(function ($customer) {
            $customer->syncStripeCustomerDetails();
        }));
    }

    public function stripeAddress()
    {
        return [
            'city' => $this->city(),
            'country' => $this->country(),
            'line1' => $this->lineOne(),
            'line2' => $this->lineTwo(),
            'postal_code' => $this->postalCode(),
            'state' => $this->state(),
        ];
    }
}
