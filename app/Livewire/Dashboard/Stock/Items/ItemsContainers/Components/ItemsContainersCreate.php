<?php

namespace App\Livewire\Dashboard\Stock\Items\ItemsContainers\Components;

use App\Livewire\Forms\KitchenContainerForm;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsContainersCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public KitchenContainerForm $instance;




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
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'stock/items/containers', 'CON');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/containers/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-container .btn--close');
        $this->dispatch('resetFile', file: 'container--file-1', defaultPreview: $this->getDefaultPreview());




        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------







    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-containers.components.items-containers-create');


    } // end function




} // end class
