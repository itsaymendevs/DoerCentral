<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage;

use App\Models\MealType;
use App\Models\PlanBundle;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Bundles extends Component
{

    use HelperTrait;



    // :: variables
    public $id;
    public $removeId;






    public function mount($id)
    {

        // :: params
        $this->id = $id;

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editBundle', $id);


    } // end function









    // -----------------------------------------------------------------






    public function manage($id)
    {


        // 1: dispatchId
        $this->dispatch('manageBundle', $id);


    } // end function














    // --------------------------------------------------------------





    public function toggleForWebsite($id)
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/toggle', $id);




        // :: refreshViews
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response->message);



    } // end function









    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmBundleRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBundleRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/menu/plans/bundles/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if





        // 1.2: renderView
        $this->render();


    } // end function









    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $bundles = PlanBundle::where('planId', $this->id)->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.manage.bundles', compact('bundles'));

    } // end function


} // end class


