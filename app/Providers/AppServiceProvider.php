<?php

namespace App\Providers;

use App\Models\CustomerSubscriptionSetting;
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


        // 1: defaultPreview
        View::share('defaultPreview', asset('assets/img/placeholder.png'));
        View::share('defaultPlate', "plate.png");
        View::share('defaultIngredient', "ingredient.png");



        // 1.2: currentDate - nextDate
        View::share('globalCurrentDate', $this->getCurrentDate());
        View::share('globalNextDate', $this->getNextDate());





        // 1.3: globalCounter
        View::share('globalSNCounter', 1);













        // ------------------------------------------------
        // ------------------------------------------------







        // 2: versionPermission
        $versionPermission = VersionPermission::first();

        View::share('versionPermission', $versionPermission);








        // ------------------------------------------------
        // ------------------------------------------------







        // // 2.1: subscriptionSettings
        // $subscriptionSettings = CustomerSubscriptionSetting::first();

        // View::share('subscriptionSettings', $subscriptionSettings);






        // // :: allowedPauseDate - allowedUnPauseDate - allowedShorten
        // View::share('allowedPauseDate', $this->getDateByDays($subscriptionSettings->pauseRestriction));
        // View::share('allowedUnPauseDate', $this->getDateByDays($subscriptionSettings->unPauseRestriction));
        // View::share('allowedSkipDate', $this->getDateByDays($subscriptionSettings->skipRestriction));
        // View::share('allowedShortenDate', $this->getDateByDays($subscriptionSettings->shortenRestriction));



        // // :: allowedCalendarMigrationDate - allowedMealSelectionDate
        // View::share('allowedCalendarMigrationDate', $this->getDateByDays($subscriptionSettings->changeCalendarRestriction));
        // View::share('allowedMealSelectionDate', $this->getDateByDays($subscriptionSettings->mealSelectionRestriction));






    } // end function



} // end provider
