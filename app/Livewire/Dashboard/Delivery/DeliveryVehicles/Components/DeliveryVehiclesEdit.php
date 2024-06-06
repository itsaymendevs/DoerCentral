<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryVehicles\Components;

use App\Livewire\Forms\VehicleForm;
use App\Models\Vehicle;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryVehiclesEdit extends Component
{




    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public VehicleForm $instance;









    #[On('editVehicle')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $vehicle = Vehicle::find($id);


        foreach ($vehicle->toArray() as $key => $value)
            $this->instance->{$key} = $value;








        // --------------------------------
        // --------------------------------




        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->plateFileName = $this->instance->plateFile ?? null;
        $this->instance->insuranceFileName = $this->instance->insuranceFile ?? null;
        $this->instance->ownershipFileName = $this->instance->ownershipFile ?? null;







        // 1.2: setFilePreview
        $preview = asset('storage/delivery/vehicles/profiles/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'vehicle--preview-2', defaultPreview: $preview);





        // 1.2.2: plate
        $preview = asset('storage/delivery/vehicles/plates/' . $this->instance->plateFile);
        $this->dispatch('setFilePreview', filePreview: 'plate--preview-2', defaultPreview: $preview);




        // 1.2.3: insurance
        if ($this->instance->insuranceFile) {

            $preview = asset('storage/delivery/vehicles/insurances/' . $this->instance->insuranceFile);
            $this->dispatch('setFilePreview', filePreview: 'insurance--preview-2', defaultPreview: $preview);

        } // end if






        // 1.2.4: ownership
        if ($this->instance->ownershipFile) {

            $preview = asset('storage/delivery/vehicles/ownerships/' . $this->instance->ownershipFile);
            $this->dispatch('setFilePreview', filePreview: 'ownership--preview-2', defaultPreview: $preview);

        } // end if







        // --------------------------------
        // --------------------------------





        // :: setSelect
        $this->dispatch('setSelect', id: '#type-select-2', value: $vehicle->type);



    } // end function








    // -----------------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // 1: uploadFileFiles
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'delivery/vehicles/profiles', $this->instance->imageFileName, 'PRO');








        // 1.1.2: plate
        if ($this->instance->plateFile != $this->instance->plateFileName)
            $this->instance->plateFileName = $this->replaceFile($this->instance->plateFile, 'delivery/vehicles/plates', $this->instance->plateFileName, 'PLT');





        // 1.1.3: insurance
        if ($this->instance->insuranceFile != $this->instance->insuranceFileName)
            $this->instance->insuranceFileName = $this->replaceFile($this->instance->insuranceFile, 'delivery/vehicles/insurances', $this->instance->insuranceFileName, 'INS');







        // 1.1.4: ownership
        if ($this->instance->ownershipFile != $this->instance->ownershipFileName)
            $this->instance->ownershipFileName = $this->replaceFile($this->instance->ownershipFile, 'delivery/vehicles/ownerships', $this->instance->ownershipFileName, 'OWN');








        // --------------------------------------
        // --------------------------------------









        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/vehicles/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-vehicle .btn--close');
        $this->dispatch('resetFile', file: 'vehicle--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plate--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'insurance--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'ownership--file-2', defaultPreview: $this->getDefaultPreview());


        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $vehicleTypes = ['Van', 'Bike'];






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.delivery-vehicles.components.delivery-vehicles-edit', compact('vehicleTypes'));


    } // end function







} // end class
