<?php

namespace App\Livewire\Dashboard\Stock\Items\ItemsOthers\Components;

use App\Livewire\Forms\StockItemForm;
use App\Models\Item;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsOthersEdit extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;



    // :: variables
    public StockItemForm $instance;







    #[On('editItem')]
    public function remount($id)
    {



        // 1: get instance
        $item = Item::find($id);

        foreach ($item->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->imageFileName = $this->instance->imageFile;






        // 1.2: setFilePreview
        $preview = asset('storage/stock/items/others/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'item--preview-2', defaultPreview: $preview);




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
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'stock/items/others', $this->instance->imageFileName, 'ITM');





        // ## log - activity ##
        $this->storeActivity('Stock', "Updated Stock Item {$this->instance->name}");




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/others/update', $this->instance);







        // :: refresh / closeModal
        $this->instance->reset();

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-item .btn--close');
        $this->dispatch('resetFile', file: 'item--file-2', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.items.items-others.components.items-others-edit');

    } // end function


} // end class
