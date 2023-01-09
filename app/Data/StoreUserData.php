<?php

namespace App\Data;

use App\Enums\RoleOption;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;

class StoreUserData extends Data
{
    public function __construct(
        #[Max(25)] public readonly string $first_name,
        #[Max(25)] public readonly string $last_name,
        public readonly string $email,
        public readonly ?string $password,
        public readonly RoleOption $role,
        public readonly ?UploadedFile $photo_file,
        #[WithoutValidation] public readonly ?int $user_id = null,
    ) {
    }

    /**
     * @param  array<string,mixed>  $payload
     * @return array<string,mixed>
     */
    public static function rules(array $payload): array
    {
        $user_id = Arr::get($payload, 'user_id');

        return [
            'email' => [
                'required',
                'string',
                'max:50',
                'email',
                Rule::unique(User::class)->ignore($user_id),
            ],
            'password' => [
                'string',
                'max:255',
                Rule::requiredIf(is_null($user_id)),
            ],
        ];
    }

    public static function fromModel(User $user): self
    {
        return new self(
            $user->first_name,
            $user->last_name,
            $user->email,
            null,
            $user->role,
            null,
            $user->id,
        );
    }

    /** @return array<string,string> */
    public static function attributes(): array
    {
        return __('users.attributes');
    }
}
