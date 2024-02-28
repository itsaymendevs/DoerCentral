<?php

namespace App\Livewire\Dashboard\Menu\Plans\Components;

use App\Livewire\Forms\PlanRangeForm;
use App\Models\PlanRange;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PlansViewRanges extends Component
{

    use HelperTrait;




    // :: variables
    public PlanRangeForm $instance;
    public $removeId;





    public function mount($id)
    {


        // 1: clone instance
        $range = PlanRange::find($id);

        foreach ($range->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function








    // ------------------------------------------------------------------








    public function update()
    {


        // :: validate
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/ranges/update', $this->instance);




        // :: makeAlert
        $this->makeAlert('success', $response->message);




    } // end function








    // ----------------------------------------------------------------







    public function toggleForWebsite($id)
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/ranges/toggle', $id);



        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function








    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmRangeRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmRangeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/menu/plans/ranges/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if




        // 1.2: refreshViews
        $this->dispatch('refreshViews');


    } // end function










    // ---------------------------------------------------------------







    public function render()
    {

        return view('livewire.dashboard.menu.plans.components.plans-view-ranges');

    } // end function



} // end class
