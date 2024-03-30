<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenLabels;

use App\Livewire\Forms\KitchenLabelForm;
use App\Models\Container;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class KitchenLabelsCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public KitchenLabelForm $instance;




    public function store()
    {


        // :: validate
        $this->instance->validate();





        dd($this->instance);


        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'kitchen/labels');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/kitchen/labels/store', $this->instance);








        // :: redirectToLabels
        return $this->redirect(route('dashboard.kitchenLabels'), navigate: false);



    } // end function





    // ------------------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $containers = Container::all();



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.manage-kitchen.kitchen-labels.kitchen-labels-create', compact('containers'));


    } // end function




} // end class
