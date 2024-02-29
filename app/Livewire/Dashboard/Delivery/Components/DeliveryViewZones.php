<?php

namespace App\Livewire\Dashboard\Delivery\Components;


use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryViewZones extends Component
{

    use HelperTrait;
    use WithPagination;



    // ::variables
    public $searchZone = '';
    public $removeId;






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editZone', $id);


    } // end function










    // -----------------------------------------------------------------




    public function remove($id)
    {


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
        $this->render();


    } // end function









    // ---------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $zones = Zone::where('name', 'LIKE', '%' . $this->searchZone . '%')
            ->paginate(env('PAGINATE'), pageName: 'zones');





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.components.delivery-view-zones', compact('zones'));

    } // end function



} // end class
