<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryViewDrivers extends Component
{

    use HelperTrait;



    // :: variables
    public $searchDriver = '';






    public $removeId;






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editDriver', $id);


    } // end function










    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmRemove')]
    public function confirmRemove()
    {



        // 1: remove
        Driver::find($this->removeId)->delete();
        $this->makeAlert('info', 'Driver has been removed');


        // 1.2: renderView
        $this->render();


    } // end function









    // ---------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $drivers = Driver::where('name', 'LIKE', '%' . $this->searchDriver . '%')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.delivery.components.delivery-view-drivers', compact('drivers'));


    } // end function




} // end class
