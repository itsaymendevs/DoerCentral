<?php

namespace App\Livewire\Dashboard\ManagePlans;


use App\Models\Feature;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Features extends Component
{

    use HelperTrait;


    // :: variables
    public $searchFeature = '';







    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editFeature', $id);



    } // end function









    // -----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $features = Feature::where('name', 'LIKE', '%' . $this->searchFeature . '%')?->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.manage-plans.features', compact('features'));



    } // end function




} // end class
