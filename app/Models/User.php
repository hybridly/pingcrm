<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property-read Account $account
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["name", "email", "password"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "owner" => "boolean",
        "email_verified_at" => "datetime",
    ];

    /** @return BelongsTo<Account,User>  */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /** @return Attribute<string,string>  */
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn($new_password) => Hash::needsRehash($new_password)
                ? Hash::make($new_password)
                : $new_password,
        );
    }
}
