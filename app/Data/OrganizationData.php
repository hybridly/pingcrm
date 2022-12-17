<?php

namespace App\Data;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

class OrganizationData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $city,
        public readonly string $phone,
        public readonly ?Carbon $deleted_at,
    ) {
    }
}
