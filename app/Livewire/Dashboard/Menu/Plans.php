<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Plans extends Component
{


    use HelperTrait;

    // ::variables
    public $removeId;








    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editPlan', $id);


    } // end function






    // --------------------------------------------------------------







    public function providePlanId($id)
    {

        // :: dispatchEvent
        $this->dispatch('providePlanId', $id);

    } // end function









    // --------------------------------------------------------------





    public function toggleForWebsite($id)
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/toggle', $id);




        // :: refreshViews
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response->message);



    } // end function








    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPlanRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmPlanRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            // :: get instance - removeFile
            $plan = Plan::find($this->removeId);

            $this->removeFile($plan->imageFile, 'menu/plans');
            $response = $this->makeRequest('dashboard/menu/plans/remove', $this->removeId);


            $this->makeAlert('info', $response->message);

        } // end if






        // 1.2: renderView
        $this->render();


    } // end function









    // ---------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans', compact('plans'));

    } // end function



} // end class
