<?php

namespace App\Livewire\Dashboard\Delivery;

use App\Models\Vehicle;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryVehicles extends Component
{


    use HelperTrait;
    use WithPagination;


    // :: variables
    public $searchVehicle = '';
    public $removeId;







    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editVehicle', $id);


    } // end function





    // -----------------------------------------------------------------







    public function editPromotion($id)
    {


        // 1: dispatchId
        $this->dispatch('editPromotion', $id);


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

        $this->makeAlert('remove', null, 'confirmVehicleRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmVehicleRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/delivery/vehicles/remove', $this->removeId);
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
        $vehicles = Vehicle::where('name', 'LIKE', '%' . $this->searchVehicle . '%')
            ->paginate(env('PAGINATE'));





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.delivery.delivery-vehicles', compact('vehicles'));


    } // end function




} // end class
