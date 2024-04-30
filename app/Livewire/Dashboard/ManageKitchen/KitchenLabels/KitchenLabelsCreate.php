<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenLabels;

use App\Livewire\Forms\KitchenLabelForm;
use App\Models\Container;
use App\Models\ServingInstruction;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class KitchenLabelsCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public KitchenLabelForm $instance;







    public function mount()
    {


        // 1: defaultValues



        // 1.2: colors
        $this->instance->backgroundColor = '#ffffff';
        $this->instance->fontColor = '#000000';
        $this->instance->borderColor = '#c2c3c5';

        $this->instance->caloriesColor = '#000000';
        $this->instance->proteinsColor = '#000000';
        $this->instance->carbsColor = '#000000';
        $this->instance->fatsColor = '#000000';




        // 1.3: showLabels
        $this->instance->isVertical = false;
        $this->instance->showCustomerName = true;
        $this->instance->showMealName = true;
        $this->instance->showMealMacros = true;
        $this->instance->showProductionDate = true;
        $this->instance->showExpiryDate = true;
        $this->instance->showServingInstructions = true;
        $this->instance->showFooterImageFile = true;



    } // end function





    // -----------------------------------------------------------










    public function store()
    {


        // :: validate
        $this->instance->validate();







        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'kitchen/labels');




        if ($this->instance->footerImageFile)
            $this->instance->footerImageFileName = $this->uploadFile($this->instance->footerImageFile, 'kitchen/labels/footers');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/kitchen/labels/store', $this->instance);








        // :: redirectToLabels
        return $this->redirect(route('dashboard.kitchenLabels'), navigate: true);



    } // end function





    // ------------------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $containers = Container::all();
        $servingInstructions = ServingInstruction::all()?->pluck('name')?->toArray() ?? [];



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.manage-kitchen.kitchen-labels.kitchen-labels-create', compact('containers', 'servingInstructions'));


    } // end function




} // end class
