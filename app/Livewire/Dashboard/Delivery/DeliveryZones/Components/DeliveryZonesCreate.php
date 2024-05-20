<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryZones\Components;


use App\Livewire\Forms\ZoneForm;
use App\Models\City;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;


class DeliveryZonesCreate extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public ZoneForm $instance;






    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/zones', 'ZON');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/zones/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-zone .btn--close');
        $this->dispatch('resetFile', file: 'zone--file-1', defaultPreview: $this->getDefaultPreview());



        $this->makeAlert('success', $response->message);


    } // end function





    // ------------------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $cities = City::all();






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.delivery.delivery-zones.components.delivery-zones-create', compact('cities'));

    } // end function


} // end class
