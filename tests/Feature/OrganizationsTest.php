<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Pest\Expectation;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->account = new Account();
    $this->account->name = "Acme Corporation";
    $this->account->save();

    $this->user = User::factory()
        ->for($this->account)
        ->create([
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "johndoe@example.com",
            "owner" => true,
        ]);

    $this->account->organizations()->createMany([
        [
            "name" => "Apple",
            "email" => "info@apple.com",
            "phone" => "647-943-4400",
            "address" => "1600-120 Bremner Blvd",
            "city" => "Toronto",
            "region" => "ON",
            "country" => "CA",
            "postal_code" => "M5J 0A8",
        ],
        [
            "name" => "Microsoft",
            "email" => "info@microsoft.com",
            "phone" => "877-568-2495",
            "address" => "One Microsoft Way",
            "city" => "Redmond",
            "region" => "WA",
            "country" => "US",
            "postal_code" => "98052",
        ],
    ]);
});

it("can view organizations", function () {
    /** @var TestResponse */
    $response = $this->actingAs($this->user)->get("/organizations");
    $response
        ->assertOk()
        ->assertHybridView("organizations.index")
        ->assertHasHybridProperty("organizations.data", 2);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty("organizations.data.0"));
    $expectation
        ->toHaveKey("name", "Apple")
        ->toHaveKey("phone", "647-943-4400")
        ->toHaveKey("city", "Toronto")
        ->toHaveKey("deleted_at", null);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty("organizations.data.1"));
    $expectation
        ->toHaveKey("name", "Microsoft")
        ->toHaveKey("phone", "877-568-2495")
        ->toHaveKey("city", "Redmond")
        ->toHaveKey("deleted_at", null);
});

it("can search for organizations", function () {
    /** @var TestResponse */
    $response = $this->actingAs($this->user)->get(
        "/organizations?keyword=Apple",
    );
    $response
        ->assertOk()
        ->assertHybridView("organizations.index")
        ->assertHybridProperty("filters.keyword", "Apple")
        ->assertHasHybridProperty("organizations.data", 1);

    /** @var Expectation<mixed> */
    $expectation = expect($response->getHybridProperty("organizations.data.0"));
    $expectation
        ->toHaveKey("name", "Apple")
        ->toHaveKey("phone", "647-943-4400")
        ->toHaveKey("city", "Toronto")
        ->toHaveKey("deleted_at", null);
});

it("cannot view deleted organizations", function () {
    $this->account
        ->organizations()
        ->firstWhere("name", "Microsoft")
        ->delete();

    /** @var TestResponse */
    $response = $this->actingAs($this->user)->get("/organizations");
    $response
        ->assertOk()
        ->assertHybridView("organizations.index")
        ->assertHasHybridProperty("organizations.data", 1)
        ->assertHybridProperty("organizations.data.0.name", "Apple");
});

it("can filter to view deleted organizations", function () {
    $this->account
        ->organizations()
        ->firstWhere("name", "Microsoft")
        ->delete();

    /** @var TestResponse */
    $response = $this->actingAs($this->user)->get(
        "/organizations?trashedOption=with",
    );
    $response
        ->assertOk()
        ->assertHybridView("organizations.index")
        ->assertHasHybridProperty("organizations.data", 2)
        ->assertHybridProperty("organizations.data.0.name", "Apple")
        ->assertHybridProperty("organizations.data.1.name", "Microsoft");
});

it("can filter to view ONLY deleted organizations", function () {
    $this->account
        ->organizations()
        ->firstWhere("name", "Microsoft")
        ->delete();

    /** @var TestResponse */
    $response = $this->actingAs($this->user)->get(
        "/organizations?trashedOption=only",
    );
    $response
        ->assertOk()
        ->assertHybridView("organizations.index")
        ->assertHasHybridProperty("organizations.data", 1)
        ->assertHybridProperty("organizations.data.0.name", "Microsoft");
});
