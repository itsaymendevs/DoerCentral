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
            RoleSeeder::class,
            UserSeeder::class,
            IngredientCategorySeeder::class,
            IngredientGroupSeeder::class,
            ExcludeSeeder::class,
            AllergySeeder::class,
            BagSeeder::class,
            PaymentMethodSeeder::class,
            CustomerSubscriptionSettingSeeder::class
        ]);

    } //end function


} // end seeder
