<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

class StoreOrganizationData extends Data
{
    public function __construct(
        #[Max(100)] public readonly string $name,
        #[Max(50), Email] public readonly ?string $email,
        #[Max(50)] public readonly ?string $phone,
        #[Max(150)] public readonly ?string $address,
        #[Max(50)] public readonly ?string $city,
        #[Max(50)] public readonly ?string $region,
        public readonly ?CountryField $country,
        #[Max(100)] public readonly ?string $postal_code,
    ) {
    }
}

#[TypeScript]
enum CountryField: string
{
    case CANADA = "CA";
    case UNITED_STATES = "US";
}
