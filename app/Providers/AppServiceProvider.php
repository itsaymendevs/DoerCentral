<?php

namespace App\Providers;

use App\Models\CustomerSubscriptionSetting;
use App\Models\Profile;
use App\Models\User;
use App\Models\VersionPermission;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    use HelperTrait;



    public function register() : void
    {


    } // end function






    // -------------------------------------------------------------------




    public function boot() : void
    {



        // 1: currentDate - nextDate
        View::share('globalCurrentDate', $this->getCurrentDate());
        View::share('globalNextDate', $this->getNextDate());
        View::share('defaultIngredient', "ingredient.png");




        // 1.2: defaultPreview
        View::share('defaultIngredient', "ingredient.png");




        // 1.3: globalCounter
        View::share('globalSNCounter', 1);




    } // end function



} // end provider
