<?php

namespace App\Livewire\Dashboard\Stock\Items\ItemsLabels;

use App\Livewire\Forms\KitchenLabelForm;
use App\Models\Container;
use App\Models\ServingInstruction;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsLabelsCreate extends Component
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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();







        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'stock/items/labels', 'LB', skipResize: true);




        if ($this->instance->footerImageFile)
            $this->instance->footerImageFileName = $this->uploadFile($this->instance->footerImageFile, 'stock/items/labels/footers', 'LB-FOOTER', skipResize: true);






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/labels/store', $this->instance);








        // :: redirectToLabels
        return $this->redirect(route('dashboard.stock.items.labels'), navigate: true);



    } // end function





    // ------------------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $containers = Container::all();
        $servingInstructions = ServingInstruction::all()?->pluck('name')?->toArray() ?? [];



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-labels.items-labels-create', compact('containers', 'servingInstructions'));


    } // end function




} // end class
