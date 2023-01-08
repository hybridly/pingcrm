<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Expectation;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->account = Account::create(['name' => 'Acme Corporation']);

    $this->user = User::factory()
        ->for($this->account)
        ->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'owner' => true,
        ]);

    $organization = $this->account
        ->organizations()
        ->create(['name' => 'Example Organization Inc.']);

    $organization->contacts()->createMany([
        [
            'account_id' => $this->account->id,
            'first_name' => 'Martin',
            'last_name' => 'Abbott',
            'email' => 'martin.abbott@example.com',
            'phone' => '555-111-2222',
            'address' => '330 Glenda Shore',
            'city' => 'Murphyland',
            'region' => 'Tennessee',
            'country' => 'US',
            'postal_code' => '57851',
        ],
        [
            'account_id' => $this->account->id,
            'first_name' => 'Lynn',
            'last_name' => 'Kub',
            'email' => 'lynn.kub@example.com',
            'phone' => '555-333-4444',
            'address' => '199 Connelly Turnpike',
            'city' => 'Woodstock',
            'region' => 'Colorado',
            'country' => 'US',
            'postal_code' => '11623',
        ],
    ]);
});

it('can view contacts', function () {
    $response = actingAs($this->user)
        ->get('/contacts')
        ->assertOk()
        ->assertHybridView('contacts.index')
        ->assertHasHybridProperty('contacts.data', 2);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty('contacts.data.0'));
    $expectation
        ->toHaveKey('first_name', 'Martin')
        ->toHaveKey('last_name', 'Abbott')
        ->toHaveKey('phone', '555-111-2222')
        ->toHaveKey('city', 'Murphyland')
        ->toHaveKey('deleted_at', null);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty('contacts.data.1'));
    $expectation
        ->toHaveKey('first_name', 'Lynn')
        ->toHaveKey('last_name', 'Kub')
        ->toHaveKey('phone', '555-333-4444')
        ->toHaveKey('city', 'Woodstock')
        ->toHaveKey('deleted_at', null);
});

it('can search for contacts', function () {
    $response = actingAs($this->user)
        ->get('/contacts?keyword=Martin')
        ->assertOk()
        ->assertHybridView('contacts.index')
        ->assertHasHybridProperty('contacts.data', 1);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty('contacts.data.0'));
    $expectation
        ->toHaveKey('first_name', 'Martin')
        ->toHaveKey('last_name', 'Abbott')
        ->toHaveKey('phone', '555-111-2222')
        ->toHaveKey('city', 'Murphyland')
        ->toHaveKey('deleted_at', null);
});

it('cannot view deleted contacts', function () {
    $this->account
        ->contacts()
        ->firstWhere('first_name', 'Martin')
        ->delete();

    actingAs($this->user)
        ->get('/contacts')
        ->assertOk()
        ->assertHybridView('contacts.index')
        ->assertHasHybridProperty('contacts.data', 1)
        ->assertHybridProperty('contacts.data.0.first_name', 'Lynn');
});

it('can filter to view deleted contacts', function () {
    $this->account
        ->contacts()
        ->firstWhere('first_name', 'Martin')
        ->delete();

    actingAs($this->user)
        ->get('/contacts?trashedOption=with')
        ->assertOk()
        ->assertHybridView('contacts.index')
        ->assertHasHybridProperty('contacts.data', 2)
        ->assertHybridProperty('contacts.data.0.first_name', 'Martin')
        ->assertHybridProperty('contacts.data.1.first_name', 'Lynn');
});

it('can filter to view ONLY deleted contacts', function () {
    $this->account
        ->contacts()
        ->firstWhere('first_name', 'Martin')
        ->delete();

    actingAs($this->user)
        ->get('/contacts?trashedOption=only')
        ->assertOk()
        ->assertHybridView('contacts.index')
        ->assertHasHybridProperty('contacts.data', 1)
        ->assertHybridProperty('contacts.data.0.first_name', 'Martin');
});
