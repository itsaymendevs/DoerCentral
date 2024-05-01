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
            CookingTypeSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            IngredientCategorySeeder::class,
            IngredientGroupSeeder::class,
            ExcludeSeeder::class,
            AllergySeeder::class,
            BagSeeder::class,
            PaymentMethodSeeder::class,
            CustomerSubscriptionSettingSeeder::class,
            DietSeeder::class,
            IngredientSeeder::class,
            TagSeeder::class,
            VersionPermissionSeeder::class,
            SizeSeeder::class,
            ServingInstructionSeeder::class,
            ItemSeeder::class,
            RecipeSeeder::class,
            MealServingInstructionSeeder::class,
        ]);

    } //end function


} // end seeder
