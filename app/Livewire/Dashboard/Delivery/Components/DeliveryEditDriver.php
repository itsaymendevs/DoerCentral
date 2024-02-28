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

        // 1: clone instance
        $driver = Driver::find($id);

        foreach ($driver->toArray() as $key => $value)
            $this->instance->{$key} = $value;





        // 1.2: setFilePreview
        $preview = asset('storage/delivery/drivers/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'driver--preview-3', defaultPreview: $preview);

        $preview = asset('storage/delivery/drivers/' . $this->instance->licenseFile);
        $this->dispatch('setFilePreview', filePreview: 'driver--preview-4', defaultPreview: $preview);





        // :: setSelect
        $this->dispatch('setSelect', id: '#shift-select-2', value: $driver->shiftTypeId);



    } // end function








    // -----------------------------------------------------------




    public function update()
    {

        // 1: clone instance






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('resetSelect');

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-driver .btn--close');
        $this->dispatch('resetFile', file: 'driver--file-3', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'driver--file-4', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', 'Driver has been updated');




    } // end function











    // -----------------------------------------------------------



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
