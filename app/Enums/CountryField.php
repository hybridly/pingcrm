<?php

namespace App\Enums;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum CountryField: string
{
    case CANADA = "CA";
    case UNITED_STATES = "US";
}
