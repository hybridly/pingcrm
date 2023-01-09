<?php

namespace App\Data;

use App\Models\User;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;

class EditUserData extends Data
{
    public function __construct(
        #[Exists(User::class)] public readonly int $id,
        public readonly StoreUserData $data,
        #[WithoutValidation] public readonly ?Carbon $deleted_at,
    ) {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            $user->id,
            StoreUserData::from($user),
            $user->deleted_at,
        );
    }
}
