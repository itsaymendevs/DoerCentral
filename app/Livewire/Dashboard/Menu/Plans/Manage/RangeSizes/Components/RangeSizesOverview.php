<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\RangeSizes\Components;

use App\Livewire\Forms\PlanBundleRangeForm;
use App\Models\PlanBundleRange;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RangeSizesOverview extends Component
{

    use HelperTrait;


    // :: variables
    public PlanBundleRangeForm $instance;






    public function mount($bundleRange)
    {


        // :: params
        foreach ($bundleRange->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        $this->calculateOverview();


    } // end function





    // ------------------------------------------------------------------






    #[On('refreshBundleOverview')]
    public function calculateOverview()
    {


        // 1: getBundleRange
        $bundleRange = PlanBundleRange::find($this->instance->id);


        $this->instance->totalCalories = $bundleRange?->types->sum('calories') ?? 0;
        $this->instance->totalPrice = $bundleRange?->types->sum('price') ?? 0;



    } // end function








    // ------------------------------------------------------------------






    public function update()
    {


        // :: validate
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/ranges/toggle', $this->instance);





    } // end function








    // ------------------------------------------------------------------








    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.manage.range-sizes.components.range-sizes-overview');

    } // end function


} // end class



