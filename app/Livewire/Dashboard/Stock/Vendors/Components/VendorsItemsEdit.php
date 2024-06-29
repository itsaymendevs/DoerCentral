<?php

namespace App\Livewire\Dashboard\Stock\Vendors\Components;

use App\Livewire\Forms\VendorItemForm;
use App\Models\VendorContainer;
use App\Models\VendorItem;
use App\Models\VendorLabel;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class VendorsItemsEdit extends Component
{


    use HelperTrait;


    // :: variable
    public VendorItemForm $instance;








    public function mount($id, $type)
    {


        // 1: get instance
        if ($type == 'Containers') {

            $item = VendorContainer::find($id);

        } elseif ($type == 'Labels') {

            $item = VendorLabel::find($id);

        } elseif ($type == 'Items') {

            $item = VendorItem::find($id);

        } // end if



        foreach ($item?->toArray() as $key => $value)
            $this->instance->{$key} = $value;





        // 1.2: extra
        $this->instance->type = $type;
        $this->instance->itemName = $item->item?->name;


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





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/vendors/items/update', $this->instance);




        // :: resetForm - resetFilePreview
        $this->makeAlert('success', $response?->message);



    } // end function









    // -----------------------------------------------------------------








    public function remove()
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: params - confirmationBox
        $this->makeAlert('remove', null, 'confirmVendorItemRemove');



    } // end function








    // -----------------------------------------------------------------------------








    #[On('confirmVendorItemRemove')]
    public function confirmRemove()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/stock/vendors/items/remove', $this->instance);
        $this->makeAlert('info', $response?->message);



        $this->dispatch('refreshViews');





    } // end function






    // ----------------------------------------------------------------






    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.vendors.components.vendors-items-edit');


    } // end function


} // end class
