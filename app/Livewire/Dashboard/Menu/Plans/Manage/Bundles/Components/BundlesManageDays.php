<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Livewire\Forms\PlanBundleDayForm;
use App\Models\PlanBundle;
use App\Models\PlanBundleDay;
use App\Models\PlanBundleRangePrice;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use stdClass;

class BundlesManageDays extends Component
{

    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public PlanBundleDayForm $instance;







    // -----------------------------------------------------------






    #[On('manageBundle')]
    public function remount($id)
    {


        // 1: get id
        $this->instance->planBundleId = $id;


    } // end function








    // -----------------------------------------------------------




    public function updateBundleRange($id, $pricePerDay)
    {



        // :: create instance
        $instance = new stdClass();

        $instance->id = $id;
        $instance->pricePerDay = $pricePerDay;



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/ranges/prices/update', $instance);





        // :: refreshBundleDays - alert
        $this->dispatch('refreshBundleSingleDayView');
        $this->makeAlert('success', $response->message);



    } // end function









    // -----------------------------------------------------------




    public function store()
    {


        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/days/store', $this->instance);





        // :: resetForm - resetFilePreview
        $this->instance->reset('days', 'discount');
        $this->dispatch('refreshBundleDaysViews');



        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------------






    #[On('refreshBundleDaysViews')]
    public function render()
    {


        // 1: dependencies
        $bundleRanges = PlanBundleRangePrice::where('planBundleId', $this->instance?->planBundleId)->get() ?? [];
        $bundleDays = PlanBundleDay::where('planBundleId', $this->instance?->planBundleId)->get() ?? [];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-manage-days', compact('bundleRanges', 'bundleDays'));

    } // end function






} // end class


