<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\Ingredient;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentItems extends Component
{


    // :: variables
    public $instance;






    public function mount($instance)
    {

        // 1: get instance
        $this->instance = $instance;


    } // end function






    // -----------------------------------------------------







    #[On('refreshBuilderItems')]
    public function remount($instance)
    {

        // 1: get instance
        $this->instance = json_decode(json_encode($instance));


        // 2: initSelect
        $this->dispatch('initCertainSelect', class: '.part--select');
        $this->dispatch('initCertainSelect', class: '.part--brand-select');
        $this->dispatch('initCertainSelect', class: '.part--type-select');
        $this->dispatch('initCertainSelect', class: '.part--cooking-type-select');







    } // end function






    // -----------------------------------------------------






    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items');


    } // end function





} // end class
