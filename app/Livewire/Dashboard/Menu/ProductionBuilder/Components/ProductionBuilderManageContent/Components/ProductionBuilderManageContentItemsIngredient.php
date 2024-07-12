<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\Ingredient;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentItemsIngredient extends Component
{


    public $instance, $i;




    public function mount($instance, $i)
    {

        // 1: get instance
        $this->i = $i;
        $this->instance = $instance;


    } // end function







    // -----------------------------------------------------





    #[On('refreshBuilderItem-{i}')]
    public function remount($index, $value)
    {

        // 1: update instance
        $this->instance->partType[$index] = $value;



    } // end function






    // -----------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::all();


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-ingredient', compact('ingredients'));



    } // end function




} // end class
