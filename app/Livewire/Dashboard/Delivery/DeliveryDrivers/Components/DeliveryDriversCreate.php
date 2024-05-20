<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryDrivers\Components;

use App\Livewire\Forms\DriverForm;
use App\Models\ShiftType;
use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryDriversCreate extends Component
{



    use HelperTrait;
    use WithFileUploads;


    // :: variables
    public DriverForm $instance;




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
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/drivers/profiles', 'PRO');




        // 1.1.2: license
        if ($this->instance->licenseFile)
            $this->instance->licenseFileName = $this->uploadFile($this->instance->licenseFile, 'delivery/drivers/licenses', 'LIC');


        if ($this->instance->licenseFile)
            $this->instance->licenseRearFileName = $this->uploadFile($this->instance->licenseRearFile, 'delivery/drivers/licenses', 'LIC-R');






        // 1.1.3: plate
        if ($this->instance->plateFile)
            $this->instance->plateFileName = $this->uploadFile($this->instance->plateFile, 'delivery/vehicles/plates', 'PLT');





        // 1.1.4: ownership
        if ($this->instance->ownershipFile)
            $this->instance->ownershipFileName = $this->uploadFile($this->instance->ownershipFile, 'delivery/vehicles/ownerships', 'OWN');









        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/drivers/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-driver .btn--close');
        $this->dispatch('resetFile', file: 'driver--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'license--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'license--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plate--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'ownership--file-1', defaultPreview: $this->getDefaultPreview());


        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $shiftTypes = ShiftType::all();
        $zones = Zone::all();




        return view('livewire.dashboard.delivery.delivery-drivers.components.delivery-drivers-create', compact('shiftTypes', 'zones'));

    } // end function


} // end class
