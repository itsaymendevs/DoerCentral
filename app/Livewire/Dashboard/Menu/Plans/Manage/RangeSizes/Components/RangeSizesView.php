<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\RangeSizes\Components;

use App\Livewire\Forms\PlanBundleRangeTypeForm;
use App\Models\PlanBundleRangeType;
use App\Models\Size;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RangeSizesView extends Component
{

    use HelperTrait;
    use ActivityTrait;


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


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();



        // ## log - activity ##
        $planBundleRangeType = PlanBundleRangeType::find($this->instance->id);

        $this->storeActivity('Menu', "Updated bundle-range size for {$planBundleRangeType->bundleRange->bundle->name} / {$planBundleRangeType->bundleRange->range->name}  / {$this->instance->mealTypeName}");






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






        return view('livewire.dashboard.menu.plans.manage.range-sizes.components.range-sizes-view', compact('sizes'));

    } // end function


} // end class
