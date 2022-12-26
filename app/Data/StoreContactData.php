<?php

namespace App\Data;

use App\Enums\CountryField;
use App\Models\Organization;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class StoreContactData extends Data
{
    public function __construct(
        #[Max(25)] public readonly string $first_name,
        #[Max(25)] public readonly string $last_name,
        #[
            Exists(Organization::class, "id"),
        ]
        public readonly ?int $organization_id,
        #[Max(50), Email] public readonly ?string $email,
        #[Max(50)] public readonly ?string $phone,
        #[Max(150)] public readonly ?string $address,
        #[Max(50)] public readonly ?string $city,
        #[Max(50)] public readonly ?string $region,
        public readonly ?CountryField $country,
        #[Max(25)] public readonly ?string $postal_code,
    ) {
    }

    /** @return array<string,string> */
    public static function attributes(): array
    {
        return __("contacts.attributes");
    }
}
