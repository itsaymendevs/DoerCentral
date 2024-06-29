<?php

namespace App\Livewire\Dashboard\Stock\Vendors\Components;

use App\Livewire\Forms\VendorItemForm;
use App\Models\Container;
use App\Models\VendorContainer;
use App\Models\VendorItem;
use App\Models\VendorLabel;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class VendorsItems extends Component
{


    use HelperTrait;



    // :: variables
    public VendorItemForm $instance;







    #[On('manageVendorItems')]
    public function remount($id)
    {

        // 1: get vendorId
        $this->instance->vendorId = $id;



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





        // :: validation
        $this->instance->validate();



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/vendors/items/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset('itemId', 'sellPrice', 'unitId', 'unitName');
        $this->dispatch('resetSelect');
        $this->render();


        $this->makeAlert('success', $response?->message);



    } // end function















    // -----------------------------------------------------------










    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $types = ['Containers', 'Labels', 'Items'];
        $vendorItems = VendorItem::where('vendorId', $this->instance?->vendorId)->get();
        $vendorLabels = VendorLabel::where('vendorId', $this->instance?->vendorId)->get();
        $vendorContainers = VendorContainer::where('vendorId', $this->instance?->vendorId)->get();






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.stock.vendors.components.vendors-items', compact('types', 'vendorItems', 'vendorLabels', 'vendorContainers'));




    } // end function





} // end class
