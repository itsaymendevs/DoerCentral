<?php

namespace App\Livewire\Dashboard\Stock\Items\ItemsLabels;

use App\Livewire\Forms\KitchenLabelForm;
use App\Models\Container;
use App\Models\Label;
use App\Models\ServingInstruction;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsLabelsEdit extends Component
{







    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public KitchenLabelForm $instance;





    public function mount($id)
    {



        // 1: clone instance
        $label = Label::find($id);

        foreach ($label->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->imageFileName = $this->instance->imageFile ?? null;
        $this->instance->footerImageFileName = $this->instance->footerImageFile ?? null;








        // 1.2: setFilePreview
        $preview = asset('storage/stock/items/labels/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'poster--preview-1', defaultPreview: $preview);




        if ($this->instance->footerImageFile) {

            $preview = asset('storage/stock/items/labels/footers/' . $this->instance->footerImageFile);
            $this->dispatch('setFilePreview', filePreview: 'footer--preview-1', defaultPreview: $preview);
            $this->dispatch('setFilePreview', filePreview: 'footer--preview-2', defaultPreview: $preview);

        } // end if







        // 1.3: setContainers
        $this->dispatch('setSelect', id: '#container-select-2', value: $label?->containers?->pluck('containerId')->toArray() ?? []);



    } // end function








    // -----------------------------------------------------------







    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: validate
        $this->instance->validate();





        // 1: uploadFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'stock/items/labels', $this->instance->imageFileName, 'LB', skipResize: true);



        if ($this->instance->footerImageFile != $this->instance->footerImageFileName)
            $this->instance->footerImageFileName = $this->replaceFile($this->instance->footerImageFile, 'stock/items/labels/footers', $this->instance->footerImageFileName, 'LB-FOOTER', skipResize: true);








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/labels/update', $this->instance);








        // :: redirectToLabels
        return $this->redirect(route('dashboard.stock.items.labels'), navigate: true);



    } // end function











    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $containers = Container::all();
        $servingInstructions = ServingInstruction::all()?->pluck('name')?->toArray() ?? [];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.items.items-labels.items-labels-edit', compact('containers', 'servingInstructions'));



    } // end function


} // end class
