<?php

namespace App\Livewire\Dashboard\Inventory\Settings\Components;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class SettingsConversionsEdit extends Component
{



    use HelperTrait;




    // :: variables
    public ConversionForm $instance;






    public function mount($id)
    {

        // 1: clone instance
        $conversion = Conversion::find($id);

        foreach ($conversion->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function













    // -----------------------------------------------------------------








    public function update()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/settings/conversions/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




    } // end function











    // -----------------------------------------------------------------








    public function editIngredients($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editConversionIngredients', $id);


    } // end function










    // -----------------------------------------------------------------








    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmConversionRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmConversionRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/inventory/settings/conversions/remove', $this->removeId);
            $this->makeAlert('info', $response->message);




            // 1.2: renderConfigurations / Settings
            $this->dispatch('refreshViews');


        } // end if





    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.settings.components.settings-conversions-edit');

    } // end function


} // end class
