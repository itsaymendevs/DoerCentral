<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage;

use App\Models\PlanBundle;
use App\Models\Size;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RangeSizes extends Component
{

    use HelperTrait;


    // :: variables
    public $id;






    public function mount($id)
    {

        // :: params
        $this->id = $id;

    } // end function











    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $bundles = PlanBundle::where('planId', $this->id)->get();





        return view('livewire.dashboard.menu.plans.manage.range-sizes', compact('bundles'));

    } // end function


} // end class




