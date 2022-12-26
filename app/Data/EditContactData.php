<?php

namespace App\Data;

use App\Models\Contact;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;

class EditContactData extends Data
{
    public function __construct(
        #[Exists(Contact::class)] public readonly int $id,
        public readonly StoreContactData $data,
        #[WithoutValidation] public readonly ?Carbon $deleted_at,
    ) {
    }

    public static function fromModel(Contact $contact): self
    {
        return new self(
            $contact->id,
            StoreContactData::from($contact),
            $contact->deleted_at,
        );
    }
}
