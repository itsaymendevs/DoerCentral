<?php

namespace App\Livewire\Dashboard\Stock\Items;

use App\Livewire\Forms\BagForm;
use App\Livewire\Forms\ServingItemForm;
use App\Models\Bag;
use App\Models\ServingItem;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemsBags extends Component
{

    use HelperTrait;
    use WithFileUploads;






    // :: variables
    public BagForm $instance;
    public ServingItemForm $instanceServing;








    public function mount()
    {



        // 1: get instance
        $bag = Bag::where('name', 'Cool Bag')->first();


        foreach ($bag->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->imageFileName = $this->instance->imageFile;





        // 1.2: setFilePreview
        $preview = asset('storage/bags/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'bag--preview-1', defaultPreview: $preview);









        // --------------------------------------------------------
        // --------------------------------------------------------




        $servingItems = ServingItem::first();


        foreach ($servingItems->toArray() as $key => $value)
            $this->instanceServing->{$key} = $value;







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



        // 1: validation
        $this->instance->validate();






        // 1.2: replaceFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'bags/', $this->instance->imageFileName, 'BAG', skipResize: true);







        // 1.3: makeRequest
        $response = $this->makeRequest('dashboard/kitchen/items/bags/update', $this->instance);




        // :: render - alert
        $this->makeAlert('success', $response->message);
        $this->render();






    } // end function










    // -----------------------------------------------------------










    public function updateServings()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if






        // --------------------------------------
        // --------------------------------------





        // 1: validation
        $this->instance->validate();





        // 1.3: makeRequest
        $response = $this->makeRequest('dashboard/kitchen/items/servings/update', $this->instanceServing);




        // :: render - alert
        $this->makeAlert('success', $response->message);
        $this->render();








    } // end function







    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-bags');


    } // end function





} // end class








