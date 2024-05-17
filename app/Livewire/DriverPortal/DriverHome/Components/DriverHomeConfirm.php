<?php

namespace App\Livewire\DriverPortal\DriverHome\Components;

use App\Livewire\Forms\DeliveryForm;
use App\Models\CustomerSubscriptionDelivery;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DriverHomeConfirm extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public DeliveryForm $instance;
    public $delivery;







    #[On('confirmDelivery')]
    public function remount($id)
    {


        // 1: get instance
        $this->instance->id = $id;
        $this->delivery = CustomerSubscriptionDelivery::find($id);



    } // end function





    // -----------------------------------------------------------








    public function update()
    {




        // :: validate
        $this->instance->validate();




        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'delivery/orders', 'DLV');







        // 1: makeRequest
        $response = $this->makeRequest('portals/driver/delivery/update', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('resetFile', file: 'delivery--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('closeModal', modal: '#confirm-delivery .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.driver-portal.driver-home.components.driver-home-confirm');



    } // end function


} // end class
