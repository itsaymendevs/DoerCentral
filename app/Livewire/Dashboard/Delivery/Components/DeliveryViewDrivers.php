<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DeliveryViewDrivers extends Component
{

    use HelperTrait;
    use WithPagination;


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


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmDriverRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmDriverRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/delivery/drivers/remove', $this->removeId);
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
        $drivers = Driver::where('name', 'LIKE', '%' . $this->searchDriver . '%')
            ->paginate(env('PAGINATE'), pageName: 'drivers');





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.delivery.components.delivery-view-drivers', compact('drivers'));


    } // end function




} // end class
