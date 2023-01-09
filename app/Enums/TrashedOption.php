<?php

namespace App\Enums;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum TrashedOption: string
{
    case WITH_TRASHED = 'with';
    case ONLY_TRASHED = 'only';
}
