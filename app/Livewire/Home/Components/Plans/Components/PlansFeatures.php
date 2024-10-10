<?php

namespace App\Livewire\Home\Components\Plans\Components;

use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class PlansFeatures extends Component
{


    use HelperTrait;

    // :: variables
    public $plan;





    #[On('viewFeatures')]
    public function remount($id)
    {


        // 1: getPlan
        $this->plan = Plan::find($id);




    } // end class









    // --------------------------------------------------------------------







    public function confirmPlan($id)
    {



        // 1: makeSessions
        $plan = Plan::find($id);

        Session::put('plan', $plan->id);
        Session::put('totalCheckoutPrice', $plan->price);


        return $this->redirect(route('website.subscribe'));






    } // end function








    // --------------------------------------------------------------------





    public function render()
    {

        return view('livewire.home.components.plans.components.plans-features');

    } // end function





} // end class
