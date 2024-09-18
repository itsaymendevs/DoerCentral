<?php

namespace App\Livewire\Central\Dashboard\ManagePlans;

use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Plans extends Component
{

    use HelperTrait;


    // :: variables
    public $searchPlan = '';





    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editPlan', $id);



    } // end function









    // -----------------------------------------------------------









    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPlanRemove');



    } // end function







    // -----------------------------------------------------------







    #[On('confirmPlanRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {


            Plan::find($this->removeId)->delete();

            $this->makeAlert('info', 'Plan has been removed');
            $this->render();


        } // end if


    } // end function













    // -----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $plans = Plan::where('name', 'LIKE', value: '%' . $this->searchPlan . '%')?->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.manage-plans.plans', compact('plans'));



    } // end function




} // end class
