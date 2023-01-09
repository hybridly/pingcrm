<?php

namespace App\Data;

use App\Enums\RoleOption;
use App\Enums\TrashedOption;
use Spatie\LaravelData\Data;

class UserSearchData extends Data
{
    public function __construct(
        public readonly ?string $keyword,
        public readonly ?TrashedOption $trashedOption,
        public readonly ?RoleOption $roleOption,
    ) {
    }
}
