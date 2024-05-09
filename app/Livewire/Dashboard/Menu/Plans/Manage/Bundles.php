<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage;

use App\Models\MealType;
use App\Models\PlanBundle;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Bundles extends Component
{

    use HelperTrait;
    use ActivityTrait;


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






    public function migrate($id)
    {




        // 1: dispatchId
        $this->dispatch('migrateBundle', $id);


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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // ## log - activity ##
        $bundle = PlanBundle::find($id);

        $this->storeActivity('Menu', "Toggled hide for bundle {$bundle->name}");





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/toggle', $id);




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

        $this->makeAlert('remove', null, 'confirmBundleRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBundleRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // ## log - activity ##
            $bundle = PlanBundle::find($this->removeId);

            $this->storeActivity('Menu', "Removed bundle {$bundle->name}");





            // 1.2: makeRequest
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


