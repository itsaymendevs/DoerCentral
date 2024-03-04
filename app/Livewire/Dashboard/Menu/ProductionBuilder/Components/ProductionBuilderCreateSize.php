<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Models\MealSize;
use App\Models\Size;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderCreateSize extends Component
{


    use HelperTrait;



    // :: variables
    public $meal;
    public $size;





    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);



    } // end function







    // -----------------------------------------------------








    public function store()
    {



        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->size = $this->size;



        // :: notEmpty
        if ($this->size) {


            // :: sizeDoesNotExists
            $exists = MealSize::where('mealId', $this->meal->id)
                ->where('sizeId', $this->size)
                ->first();





            // 1: makeRequest
            if (empty($exists)) {

                $response = $this->makeRequest('dashboard/menu/builder/sizes/store', $instance);
                $this->makeAlert('success', $response->message);

            } // end if







            // :: resetSize - resetSelect - refreshViews
            $this->size = null;
            $this->dispatch('setSelect', id: '#size-select-1', value: '');
            $this->dispatch('refreshSizeViews');


        } // end if



    } // end function











    // -----------------------------------------------------










    #[On('refreshSizeViews')]
    public function render()
    {



        // 1: get Sizes -> notAssigned
        $currentSizes = $this->meal?->sizes ? $this->meal->sizes->pluck('sizeId')->toArray() : [];
        $sizes = Size::whereNotIn('id', $currentSizes)->get();



        // :: initTooltips
        $this->dispatch('initTooltips');
        $this->dispatch('refreshRawSelect', id: '#size-select-1');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-create-size', compact('sizes'));


    } // end function


} // end class


