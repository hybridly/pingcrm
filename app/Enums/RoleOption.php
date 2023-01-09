<?php

namespace App\Enums;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum RoleOption: string
{
    case USER = 'user';
    case OWNER = 'owner';
}
