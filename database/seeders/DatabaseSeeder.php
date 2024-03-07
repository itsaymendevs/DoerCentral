<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run() : void
    {

        $this->call([
            CitySeeder::class,
            CityDistrictSeeder::class,
            ShiftTypeSeeder::class,
            HolidaySeeder::class,
            MealTypeSeeder::class,
            ContainerSeeder::class,
            UnitSeeder::class,
            CuisineSeeder::class,
            // TagSeeder::class,
            // DietSeeder::class,

        ]);

    } //end function


} // end seeder
