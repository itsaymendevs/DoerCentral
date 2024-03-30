<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Livewire\Forms\PlanBundleDayForm;
use App\Models\PlanBundleDay;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class BundlesViewDay extends Component
{

    use HelperTrait;




    // :: variables
    public PlanBundleDayForm $instance;
    public $removeId, $id;





    public function mount($id)
    {


        // 1: clone instance
        $this->id = $id;
        $bundleDay = PlanBundleDay::find($id);

        foreach ($bundleDay->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function








    // ------------------------------------------------------------------








    public function update()
    {


        // :: validate
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/days/update', $this->instance);




        // :: makeAlert
        $this->makeAlert('success', $response->message);




    } // end function










    // -----------------------------------------------------------------






    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmBundleDayRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBundleDayRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/menu/plans/bundles/days/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if




        // 1.2: refreshViews
        $this->dispatch('refreshBundleDaysViews');


    } // end function










    // ---------------------------------------------------------------








    #[On('refreshBundleSingleDayView')]
    public function render()
    {



        // 1: dependencies
        $bundleDay = PlanBundleDay::find($this->id);





        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-view-day', compact('bundleDay'));



    } // end function



} // end class
