<?php

namespace App\Livewire\Dashboard\Stock\Items\ItemsOthers\Components;

use App\Livewire\Forms\StockItemForm;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsOthersCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public StockItemForm $instance;




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
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'stock/items/others', 'ITM');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/others/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-item .btn--close');
        $this->dispatch('resetFile', file: 'item--file-1', defaultPreview: $this->getDefaultPreview());




        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------







    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-others.components.items-others-create');


    } // end function




} // end class
