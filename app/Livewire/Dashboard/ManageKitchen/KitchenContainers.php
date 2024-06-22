<?php

namespace App\Livewire\Dashboard\ManageKitchen;

use App\Models\Container;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class KitchenContainers extends Component
{


    use HelperTrait;


    // :: variables
    public $removeId;









    public function updateCharge($id, $charge)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: create instance
        $instance = new stdClass();

        $instance->id = $id;
        $instance->charge = $charge;



        // :: checkCharge
        if ($charge >= 0) {


            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/kitchen/containers/charge/update', $instance);


            // :: render - alert
            $this->makeAlert('success', $response->message);
            $this->render();


        } // end if




    } // end function











    // -----------------------------------------------------------











    public function updateLid($id, $lidCharge)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: create instance
        $instance = new stdClass();

        $instance->id = $id;
        $instance->lidCharge = $lidCharge;



        // :: checkCharge
        if ($lidCharge >= 0) {


            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/kitchen/containers/lid-charge/update', $instance);


            // :: render - alert
            $this->makeAlert('success', $response->message);
            $this->render();


        } // end if




    } // end function











    // -----------------------------------------------------------








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

        $this->makeAlert('remove', null, 'confirmContainerRemove');



    } // end function









    // -----------------------------------------------------------









    #[On('confirmContainerRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/kitchen/containers/remove', $this->removeId);
            $this->makeAlert('info', $response->message);




            // 1.2: renderViews
            $this->dispatch('refreshViews');


        } // end if





    } // end function













    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $containers = Container::all();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.manage-kitchen.kitchen-containers', compact('containers'));


    } // end function





} // end class
