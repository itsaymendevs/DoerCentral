<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryVehicles\Components;

use App\Livewire\Forms\VehicleForm;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryVehiclesCreate extends Component
{



    use HelperTrait;
    use WithFileUploads;


    // :: variables
    public VehicleForm $instance;




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
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/vehicles/profiles', 'PRO');





        // 1.1.2: plate
        if ($this->instance->plateFile)
            $this->instance->plateFileName = $this->uploadFile($this->instance->plateFile, 'delivery/vehicles/plates', 'PLT');






        // 1.1.3: insurance
        if ($this->instance->insuranceFile)
            $this->instance->insuranceFileName = $this->uploadFile($this->instance->insuranceFile, 'delivery/vehicles/insurances', 'INS');






        // 1.1.4: ownership
        if ($this->instance->ownershipFile)
            $this->instance->ownershipFileName = $this->uploadFile($this->instance->ownershipFile, 'delivery/vehicles/ownerships', 'OWN');








        // ---------------------------------------
        // ---------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/vehicles/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-vehicle .btn--close');
        $this->dispatch('resetFile', file: 'vehicle--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plate--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'insurance--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'ownership--file-1', defaultPreview: $this->getDefaultPreview());


        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $vehicleTypes = ['Van', 'Bike'];



        return view('livewire.dashboard.delivery.delivery-vehicles.components.delivery-vehicles-create', compact('vehicleTypes'));

    } // end function


} // end class



