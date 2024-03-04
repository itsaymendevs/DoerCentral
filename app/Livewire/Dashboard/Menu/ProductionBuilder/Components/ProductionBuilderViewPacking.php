<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPackingForm;
use App\Models\MealPacking;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderViewPacking extends Component
{
    use HelperTrait;



    // :: variables
    public MealPackingForm $instance;
    public $removeId;






    public function mount($id)
    {

        // 1: get instance
        $packing = MealPacking::find($id);

        foreach ($packing->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function











    // -----------------------------------------------------






    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPackingRemove');



    } // end function







    // -----------------------------------------------------





    #[On('confirmPackingRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/menu/builder/packings/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if





        // 1.2: renderParent
        $this->dispatch('refreshPackings');


    } // end function









    // -----------------------------------------------------------------













    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-view-packing');


    } // end function


} // end class


