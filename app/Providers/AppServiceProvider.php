<?php

namespace App\Providers;

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



        // 1.2: todayDate - tmwDate
        View::share('globalTodayDate', $this->getCurrentDate());
        View::share('globalTmwDate', $this->getTmwDate());





        // 1.3: pauseDate - unPauseDate
        View::share('globalPauseDate', $this->getPauseDate());
        View::share('globalUnPauseDate', $this->getUnPauseDate());



        // 1.4: globalCounter
        View::share('globalSNCounter', 1);





        // ------------------------------------------------
        // ------------------------------------------------







        // :: versionPermission
        $versionPermission = VersionPermission::first();

        View::share('versionPermission', $versionPermission);




    } // end function



} // end provider
