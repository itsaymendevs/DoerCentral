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




    public function mount()
    {
        $this->dispatch('initChildSelect');

    } // end function






    // -----------------------------------------------------------








    #[On('editZone')]
    public function remount($id)
    {

        // 1: clone instance
        $zone = Zone::find($id);

        foreach ($zone->toArray() as $key => $value)
            $this->instance->{$key} = $value;





        // 1.2: setFilePreview
        $preview = asset('storage/delivery/zones/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'zone--preview-2', defaultPreview: $preview);




        // 1.3: setSelect
        $this->dispatch('setSelect', id: '#city-select-2', value: $zone->cityId);
        $this->dispatch('setSelect', id: '#district-select-2', value: $zone->districts?->pluck('cityDistrictId')->toArray());


    } // end function








    // -----------------------------------------------------------




    public function update()
    {

        // 1: clone instance

        dd($this->instance);


        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('resetSelect');

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-zone .btn--close');
        $this->dispatch('resetFile', file: 'zone--file-2', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', 'Zone has been updated');




    } // end function











    // -----------------------------------------------------------



    public function render()
    {


        // 1: dependencies
        $cities = City::all();
        $cityDistricts = CityDistrict::all();






        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.delivery.components.delivery-edit-zone', compact('cities', 'cityDistricts'));

    } // end function


} // end class

