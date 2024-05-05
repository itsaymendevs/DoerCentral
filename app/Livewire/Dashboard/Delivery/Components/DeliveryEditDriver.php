<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\DriverForm;
use App\Models\Driver;
use App\Models\ShiftType;
use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryEditDriver extends Component
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

        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->licenseFileName = $this->instance->licenseFile;








        // 1.2: setFilePreview
        $preview = asset('storage/delivery/drivers/profiles/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'driver--preview-3', defaultPreview: $preview);

        $preview = asset('storage/delivery/drivers/licenses/' . $this->instance->licenseFile);
        $this->dispatch('setFilePreview', filePreview: 'driver--preview-4', defaultPreview: $preview);





        // :: setSelect
        $this->dispatch('setSelect', id: '#shift-select-2', value: $driver->shiftTypeId);
        $this->dispatch('setSelect', id: '#zone-select-2', value: $driver?->zones?->pluck('zoneId')->toArray());



    } // end function








    // -----------------------------------------------------------




    public function update()
    {




        // 1: uploadFileFiles
        if ($this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'delivery/drivers/profiles', $this->instance->imageFileName, 'PRO');

        } // end if


        if ($this->instance->licenseFile != $this->instance->licenseFileName) {

            $this->instance->licenseFileName = $this->replaceFile($this->instance->licenseFile, 'delivery/drivers/licenses', $this->instance->licenseFileName, 'LIC');

        } // end if








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/drivers/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-driver .btn--close');
        $this->dispatch('resetFile', file: 'driver--file-3', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'driver--file-4', defaultPreview: $this->getDefaultPreview());
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



        return view('livewire.dashboard.delivery.components.delivery-edit-driver', compact('zones', 'shiftTypes'));

    } // end function


} // end class
