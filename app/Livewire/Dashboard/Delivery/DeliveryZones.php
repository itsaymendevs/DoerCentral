<?php

namespace App\Livewire\Dashboard\Delivery;

use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class DeliveryZones extends Component
{



    use HelperTrait;
    use WithPagination;



    // ::variables
    public $searchZone = '';






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editZone', $id);


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

        $this->makeAlert('remove', null, 'confirmZoneRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmZoneRemove')]
    public function confirmRemove()
    {



        // 1: remove / imageFile
        $zone = Zone::find($this->removeId);


        $this->removeFile($zone->imageFile, 'delivery/zones');
        $this->makeRequest('dashboard/delivery/zones/remove', $this->removeId);




        // 1.2: renderView
        $this->makeAlert('info', 'Zone has been removed');
        $this->dispatch('refreshViews');

    } // end function









    // ---------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $zones = Zone::where('name', 'LIKE', '%' . $this->searchZone . '%')
            ->paginate(env('PAGINATE'));





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.delivery-zones', compact('zones'));

    } // end function



} // end class
