<?php

namespace App\Models;

use App\Data\SearchOrganizationData;
use App\Data\TrashedOption;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "city",
        "region",
        "country",
        "postal_code",
    ];

    /** @return BelongsTo<Account,Organization>  */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeFilter(
        Builder $query,
        SearchOrganizationData $data,
    ): Builder {
        return $query
            ->when(
                $data->keyword,
                fn(Builder $query, $search) => $query->where(
                    "name",
                    "like",
                    "%" . $search . "%",
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
