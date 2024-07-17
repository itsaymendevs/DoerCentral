<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\CookingType;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentItemsIngredient extends Component
{


    // :: variables
    public $instance, $i;







    public function mount($instance, $i)
    {

        // 1: get instance
        $this->i = $i;
        $this->instance = $instance;



        // 1.2: getBrands
        $this->getPartBrands();



    } // end function










    // -----------------------------------------------------





    #[On('refreshBuilderPartUnique')]
    public function refreshPart($instance)
    {


        // 1: update instance
        $this->instance->partId[$this->i] = $instance['partId'][$this->i];
        $this->instance->partBrandId[$this->i] = $instance['partBrandId'][$this->i];



        // 1.2: getBrands
        $this->getPartBrands();




    } // end function









    // -----------------------------------------------------





    #[On('refreshBuilderPartBrandUnique')]
    public function refreshPartBrand($instance)
    {


        // 1: update instance
        $this->instance->partBrandId[$this->i] = $instance['partBrandId'][$this->i];



    } // end function











    // -----------------------------------------------------








    #[On('refreshBuilderPartTypeUnique')]
    public function refreshPartType($instance)
    {

        // 1: update instance
        $this->instance->partType[$this->i] = $instance['partType'][$this->i];
        $this->instance->cookingTypeId[$this->i] = $instance['cookingTypeId'][$this->i];



    } // end function









    // -----------------------------------------------------








    public function getPartBrands()
    {



        // 1: getBrands
        $brands = IngredientMacro::where('ingredientId', $this->instance?->partId[$this->i])
                ?->get(['id', 'brand as text'])?->toArray() ?? [];




        // 1.2: pre-option
        count($brands ?? []) ? array_unshift($brands, ['id' => '', 'text' => '']) : null;


        $this->dispatch('refreshSelect', id: "#part--brand-select-{$this->i}", data: $brands);
        $this->dispatch('setSelect', id: "#part--brand-select-{$this->i}", value: $this->instance->partBrandId[$this->i] ?? null);





    } // end function












    // -----------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::all();
        $cookingTypes = CookingType::all();





        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-ingredient', compact('ingredients', 'cookingTypes'));



    } // end function




} // end class
