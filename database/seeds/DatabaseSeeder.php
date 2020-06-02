<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\User;
use App\Country;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

        // Create 10 records of countries
        factory(Country::class, 10)->create()->each(function ($country) {
            // Seed the companies and seed relation with country
            factory(Company::class, 5)->create([
                'country_id' => $country->id,
            ]);
        });

        $companies = Company::all();

        //Make many to many relationships between users and companies
        User::all()->each(function ($user) use ($companies) {
            $user->companies()->attach(
                $companies->random(rand(1, 50))->pluck('id')->toArray()
            );
        });
    }
}
