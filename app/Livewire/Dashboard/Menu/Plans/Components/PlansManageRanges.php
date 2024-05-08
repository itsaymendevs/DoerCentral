<?php

namespace App\Livewire\Dashboard\Menu\Plans\Components;

use App\Livewire\Forms\PlanRangeForm;
use App\Models\Plan;
use App\Models\PlanRange;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PlansManageRanges extends Component
{


    use HelperTrait;

    // ::variables
    public PlanRangeForm $instance;









    #[On('providePlanId')]
    public function remount($id)
    {

        // :: params
        $plan = Plan::find($id);

        $this->instance->planId = $plan->id;
        $this->instance->planName = $plan->name;




    } // end function







    // ------------------------------------------------------------------








    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/ranges/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset('name', 'caloriesRange', 'desc');
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------














    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $ranges = $this->instance->planId ? PlanRange::where('planId', $this->instance->planId)->get() : [];




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.components.plans-manage-ranges', compact('ranges'));

    } // end function



} // end class


