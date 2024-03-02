<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\ZoneForm;
use App\Models\City;
use App\Models\CityDistrict;
use App\Models\Zone;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryEditZone extends Component
{

    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public ZoneForm $instance;




    public function setChildSelect()
    {


        // :: setDefaultValues if instance exists
        if ($this->instance?->id) {



            // 1: getZone
            $zone = Zone::find($this->instance->id);



            // 1.2: setDistricts
            $this->dispatch('setSelect', id: '#district-select-2', value: $zone->districts?->pluck('cityDistrictId')->toArray());


        } // end if


    } // end function








    // -----------------------------------------------------------








    #[On('editZone')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $zone = Zone::find($id);

        foreach ($zone->toArray() as $key => $value)
            $this->instance->{$key} = $value;

        $this->instance->imageFileName = $this->instance->imageFile;




        // 1.2: setFilePreview
        $preview = asset('storage/delivery/zones/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'zone--preview-2', defaultPreview: $preview);




        // 1.3: setSelect
        $this->dispatch('setSelect', id: '#city-select-2', value: $zone->cityId);




    } // end function








    // -----------------------------------------------------------




    public function update()
    {



        // 1: uploadFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/zones');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/zones/update', $this->instance);








        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('resetSelect');

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-zone .btn--close');
        $this->dispatch('resetFile', file: 'zone--file-2', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {


        // 1: dependencies
        $cities = City::all();






        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.delivery.components.delivery-edit-zone', compact('cities'));

    } // end function


} // end class

