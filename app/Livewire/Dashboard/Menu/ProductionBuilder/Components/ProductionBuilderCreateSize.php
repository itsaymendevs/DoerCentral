<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Models\MealSize;
use App\Models\Size;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderCreateSize extends Component
{


    use HelperTrait;
    use ActivityTrait;


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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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




                // ## log - activity ##
                $size = Size::find($this->size);

                $this->storeActivity('Menu', "Assigned size {$size->name} for {$this->meal->name}");








                // 1.2: makeRequest
                $response = $this->makeRequest('dashboard/menu/builder/sizes/store', $instance);



                // :: resetPage / openTab - redirectRoute - alert
                return $this->redirect(route('dashboard.menuProductionBuilder', [$this->meal->id]) . "#tab-2", navigate: false);




            } // end if







            // :: resetSize - resetSelect - refreshViews - refreshMealSizeIngredients
            $this->size = null;
            $this->dispatch('setSelect', id: '#size-select-1', value: '');

            $this->dispatch('refreshSizeViews');
            $this->dispatch('refreshMealSizeIngredients', id: $this->meal->id);
            $this->dispatch('refreshRawSelect', id: '#size-select-1');



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




        return view('livewire.dashboard.menu.production-builder.components.production-builder-create-size', compact('sizes'));


    } // end function





} // end class


