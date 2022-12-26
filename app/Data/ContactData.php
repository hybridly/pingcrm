<?php

namespace App\Data;

use App\Models\Contact;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class ContactData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $city,
        public readonly ?OrganizationData $organization,
        public readonly ?string $phone,
        public readonly ?Carbon $deleted_at,
    ) {
    }

    public static function fromModel(Contact $contact): self
    {
        return new self(
            $contact->id,
            $contact->first_name,
            $contact->last_name,
            $contact->city,
            OrganizationData::optional($contact->organization),
            $contact->phone,
            $contact->deleted_at,
        );
    }
}
