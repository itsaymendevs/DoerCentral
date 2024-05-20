<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryDrivers\Components;

use App\Livewire\Forms\DriverForm;
use App\Models\Driver;
use App\Models\ShiftType;
use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;



class DeliveryDriversEdit extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public DriverForm $instance;









    #[On('editDriver')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $driver = Driver::find($id);


        foreach ($driver->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        // :: resetPassword
        $this->instance->password = null;








        // --------------------------------
        // --------------------------------




        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->licenseFileName = $this->instance->licenseFile ?? null;
        $this->instance->licenseRearFileName = $this->instance->licenseRearFile ?? null;
        $this->instance->plateFileName = $this->instance->plateFile ?? null;
        $this->instance->ownershipFileName = $this->instance->ownershipFile ?? null;







        // 1.2: setFilePreview
        $preview = asset('storage/delivery/drivers/profiles/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'driver--preview-2', defaultPreview: $preview);




        // 1.2.2: license
        $preview = asset('storage/delivery/drivers/licenses/' . $this->instance->licenseFile);
        $this->dispatch('setFilePreview', filePreview: 'license--preview-3', defaultPreview: $preview);


        $preview = asset('storage/delivery/drivers/licenses/' . $this->instance->licenseRearFile);
        $this->dispatch('setFilePreview', filePreview: 'license--preview-4', defaultPreview: $preview);





        // 1.2.3: plate
        $preview = asset('storage/delivery/vehicles/plates/' . $this->instance->plateFile);
        $this->dispatch('setFilePreview', filePreview: 'plate--preview-2', defaultPreview: $preview);





        // 1.2.4: ownership
        $preview = asset('storage/delivery/vehicles/ownerships/' . $this->instance->ownershipFile);
        $this->dispatch('setFilePreview', filePreview: 'ownership--preview-2', defaultPreview: $preview);








        // --------------------------------
        // --------------------------------





        // :: setSelect
        $this->dispatch('setSelect', id: '#shift-select-2', value: $driver->shiftTypeId);
        $this->dispatch('setSelect', id: '#zone-select-2', value: $driver?->zones?->pluck('zoneId')->toArray());



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
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'delivery/drivers/profiles', $this->instance->imageFileName, 'PRO');







        // 1.1.2: license
        if ($this->instance->licenseFile != $this->instance->licenseFileName)
            $this->instance->licenseFileName = $this->replaceFile($this->instance->licenseFile, 'delivery/drivers/licenses', $this->instance->licenseFileName, 'LIC');




        if ($this->instance->licenseRearFile != $this->instance->licenseRearFileName)
            $this->instance->licenseRearFileName = $this->replaceFile($this->instance->licenseRearFile, 'delivery/drivers/licenses', $this->instance->licenseRearFileName, 'LIC-R');








        // 1.1.3: plate
        if ($this->instance->plateFile != $this->instance->plateFileName)
            $this->instance->plateFileName = $this->replaceFile($this->instance->plateFile, 'delivery/vehicles/plates', $this->instance->plateFileName, 'PLT');





        // 1.1.4: ownership
        if ($this->instance->ownershipFile != $this->instance->ownershipFileName)
            $this->instance->ownershipFileName = $this->replaceFile($this->instance->ownershipFile, 'delivery/vehicles/ownerships', $this->instance->ownershipFileName, 'OWN');








        // --------------------------------------
        // --------------------------------------









        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/drivers/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-driver .btn--close');
        $this->dispatch('resetFile', file: 'driver--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'license--file-3', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'license--file-4', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plate--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'ownership--file-2', defaultPreview: $this->getDefaultPreview());



        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $shiftTypes = ShiftType::all();
        $zones = Zone::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.delivery-drivers.components.delivery-drivers-edit', compact('zones', 'shiftTypes'));

    } // end function


} // end class
