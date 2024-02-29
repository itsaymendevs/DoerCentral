<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\ZoneForm;
use App\Models\City;
use App\Models\CityDistrict;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryCreateZone extends Component
{

    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public ZoneForm $instance;






    public function mount()
    {

        $this->dispatch('initChildSelect');

    } // end function




    // ------------------------------------------------------------------







    public function store()
    {



        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/zones');






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




        return view('livewire.dashboard.delivery.components.delivery-create-zone', compact('cities'));

    } // end function


} // end class
