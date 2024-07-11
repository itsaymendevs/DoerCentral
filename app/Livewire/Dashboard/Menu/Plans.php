<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\ColorPalette;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Plans extends Component
{


    use HelperTrait;
    use ActivityTrait;









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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // ## log - activity ##
        $plan = Plan::find($id);

        $this->storeActivity('Menu', "Toggled hide for {$plan->name}");






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/toggle', $id);




        // :: refreshViews
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response->message);



    } // end function








    // -----------------------------------------------------------------




    public function remove($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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



            // ## log - activity ##
            $this->storeActivity('Menu', "Remove plan {$plan->name}");




            // 1.2: makeRequest
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
        $palettes = ColorPalette::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans', compact('plans', 'palettes'));

    } // end function



} // end class
