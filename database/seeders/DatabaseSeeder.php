<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $account = Account::create(["name" => "Acme Corporation"]);

        User::factory()
            ->for($account)
            ->create([
                "first_name" => "John",
                "last_name" => "Doe",
                "email" => "johndoe@example.com",
                "password" => "secret",
                "owner" => true,
            ]);
        User::factory(5)
            ->for($account)
            ->create();

        $organizations = Organization::factory(100)
            ->for($account)
            ->create();

        Contact::factory(100)
            ->for($account)
            ->state(fn() => ["organization_id" => $organizations->random()->id])
            ->create();
    }
}
