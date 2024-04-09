<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\RangeSizes\Components;

use App\Livewire\Forms\PlanBundleRangeTypeForm;
use App\Models\Size;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RangeSizesView extends Component
{

    use HelperTrait;


    // :: variables
    public PlanBundleRangeTypeForm $instance;






    public function mount($bundleRangeType)
    {


        // :: params
        foreach ($bundleRangeType->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        // :: helpers
        $this->instance->mealTypeName = $bundleRangeType->mealType->name;



    } // end function







    // ------------------------------------------------------------------






    public function updateSize()
    {




        // 1: getSize
        $size = Size::find($this->instance->sizeId);


        // 1.2: updateCalories - Price
        $this->instance->calories = $size->calories;
        $this->instance->price = $size->price;






        // :: callUpdate
        $this->update();




    } // end function









    // ------------------------------------------------------------------






    public function update()
    {


        // :: validate
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/ranges/update', $this->instance);




        // :: refreshOverview
        $this->dispatch('refreshBundleOverview');



    } // end function








    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $sizes = Size::all();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.manage.range-sizes.components.range-sizes-view', compact('sizes'));

    } // end function


} // end class
