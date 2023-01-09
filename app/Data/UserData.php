<?php

namespace App\Data;

use App\Enums\RoleOption;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $email,
        public readonly ?string $photo_path,
        public readonly ?RoleOption $role,
        public readonly ?Carbon $deleted_at,
    ) {
    }
}
