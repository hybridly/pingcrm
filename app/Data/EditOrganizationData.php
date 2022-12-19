<?php

namespace App\Data;

use App\Models\Organization;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;

class EditOrganizationData extends Data
{
    public function __construct(
        #[Exists(Organization::class)] public readonly int $id,
        public readonly StoreOrganizationData $data,
        #[WithoutValidation] public readonly ?Carbon $deleted_at,
    ) {
    }

    public static function fromModel(Organization $organization): self
    {
        return new self(
            $organization->id,
            StoreOrganizationData::from($organization),
            $organization->deleted_at,
        );
    }
}
