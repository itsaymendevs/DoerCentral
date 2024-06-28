<?php

namespace App\Livewire\Dashboard\Stock;

use App\Models\Vendor;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Vendors extends Component
{


    use HelperTrait;
    use WithPagination;


    // :: variable
    public $searchVendor = '';






    public function manageItems($id)
    {

        // :: dispatchId
        $this->dispatch('manageVendorItems', $id);


    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editVendor', $id);


    } // end function






    // -----------------------------------------------------------------







    public function remove($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmVendorRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmVendorRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/stock/vendors/remove', $this->removeId);
            $this->makeAlert('info', $response->message);


            $this->render();


        } // end if



    } // end function








    // ----------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $vendors = Vendor::orderBy('created_at', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchVendor . '%')
            ->paginate(env('PAGINATE_XXL'));






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.vendors', compact('vendors'));


    } // end function





} // end class
