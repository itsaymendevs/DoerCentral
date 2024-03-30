<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenLabels;

use App\Livewire\Forms\KitchenLabelForm;
use App\Models\Container;
use App\Models\Label;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class KitchenLabelsEdit extends Component
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

        $this->instance->imageFileName = $this->instance->imageFile;








        // 1.2: setFilePreview
        $preview = asset('storage/kitchen/labels/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'label--preview-2', defaultPreview: $preview);




        // 1.3: setContainers
        $this->dispatch('setSelect', id: '#container-select-2', value: $label?->containers?->pluck('containerId')->toArray() ?? []);



    } // end function








    // -----------------------------------------------------------







    public function update()
    {


        // :: validate
        $this->instance->validate();







        // 1: uploadFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'kitchen/labels');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/kitchen/labels/update', $this->instance);








        // :: redirectToLabels
        return $this->redirect(route('dashboard.kitchenLabels'), navigate: true);



    } // end function











    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies
        $containers = Container::all();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.manage-kitchen.kitchen-labels.kitchen-labels-edit', compact('containers'));



    } // end function


} // end class
