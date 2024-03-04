<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\DietForm;
use App\Models\Diet;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsViewDiet extends Component
{

    use HelperTrait;




    // :: variables
    public DietForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $diet = Diet::find($id);

        foreach ($diet->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function





    // -----------------------------------------------------------








    public function update()
    {

        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/diets/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




    } // end function










    // -----------------------------------------------------------------








    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmDietRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmDietRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/menu/settings/diets/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: refreshViews / Settings
            $this->dispatch('refreshViews');


        } // end if





    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.settings.components.settings-view-diet');

    } // end function


} // end class

