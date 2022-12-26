<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

class SearchData extends Data
{
    public function __construct(
        public readonly ?string $keyword,
        public readonly ?TrashedOption $trashedOption,
    ) {
    }
}

#[TypeScript]
enum TrashedOption: string
{
    case WITH_TRASHED = 'with';
    case ONLY_TRASHED = 'only';
}
