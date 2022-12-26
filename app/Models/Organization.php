<?php

namespace App\Models;

use App\Data\SearchData;
use App\Data\TrashedOption;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    /** @return BelongsTo<Account,Organization>  */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /** @return HasMany<Contact> */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function scopeFilter(Builder $query, SearchData $data): Builder
    {
        return $query
            ->when(
                $data->keyword,
                fn (Builder $query, $search) => $query->where(
                    'name',
                    'like',
                    '%'.$search.'%',
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
            });
    }
}
