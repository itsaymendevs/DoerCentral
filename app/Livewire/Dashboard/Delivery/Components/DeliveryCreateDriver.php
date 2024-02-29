<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\DriverForm;
use App\Models\ShiftType;
use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryCreateDriver extends Component
{

    use HelperTrait;
    use WithFileUploads;


    // :: variables
    public DriverForm $instance;




    public function store()
    {



        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/drivers/profiles/');

        if ($this->instance->licenseFile)
            $this->instance->licenseFileName = $this->uploadFile($this->instance->licenseFile, 'delivery/drivers/licenses');





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/drivers/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-driver .btn--close');
        $this->dispatch('resetFile', file: 'driver--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'driver--file-2', defaultPreview: $this->getDefaultPreview());



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $shiftTypes = ShiftType::all();
        $zones = Zone::all();




        return view('livewire.dashboard.delivery.components.delivery-create-driver', compact('shiftTypes', 'zones'));

    } // end function


} // end class

