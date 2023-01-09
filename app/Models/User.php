<?php

namespace App\Models;

use App\Data\UserSearchData;
use App\Enums\RoleOption;
use App\Enums\TrashedOption;
use Illuminate\Contracts\Database\Query\Builder;
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
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'owner' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    /** @var array<string> */
    protected $appends = ['role'];

    /** @return BelongsTo<Account,User>  */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /** @return Attribute<string,string>  */
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($new_password) => Hash::needsRehash($new_password)
                ? Hash::make($new_password)
                : $new_password,
        );
    }

    /** @return Attribute<string|null,string|null> */
    public function photoPath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? route('image', ['path' => $value, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
        );
    }

    public function getRoleAttribute(): RoleOption
    {
        return $this->owner ? RoleOption::OWNER : RoleOption::USER;
    }

    public function scopeOrderByName(Builder $query): Builder
    {
        return $query->orderBy('last_name')->orderBy('first_name');
    }

    public function scopeFilter(Builder $query, UserSearchData $data): Builder
    {
        return $query
            ->when(
                $data->keyword,
                fn (Builder $query, $search) => $query->where(
                    fn ($query) => $query
                        ->where('first_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%'),
                ),
            )
            ->when($data->trashedOption, function (
                Builder $query,
                $trashedOption,
            ) {
                if ($trashedOption === TrashedOption::WITH_TRASHED) {
                    $query->withTrashed();
                } elseif ($trashedOption === TrashedOption::ONLY_TRASHED) {
                    $query->onlyTrashed();
                }
            })
            ->when($data->roleOption, function (Builder $query, $roleOption) {
                if ($roleOption === RoleOption::USER) {
                    $query->where('owner', false);
                } elseif ($roleOption === RoleOption::OWNER) {
                    $query->where('owner', true);
                }
            });
    }
}
