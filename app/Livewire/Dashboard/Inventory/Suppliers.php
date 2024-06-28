<?php

namespace App\Livewire\Dashboard\Inventory;

use App\Models\Supplier;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Suppliers extends Component
{


    use HelperTrait;
    use WithPagination;


    // :: variable
    public $searchSupplier = '';
    public $removeId;








    public function manageIngredients($id)
    {

        // :: dispatchId
        $this->dispatch('manageSupplierIngredients', $id);

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editSupplier', $id);


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

        $this->makeAlert('remove', null, 'confirmSupplierRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmSupplierRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/inventory/suppliers/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();


        } // end if



    } // end function






    // ----------------------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $suppliers = Supplier::orderBy('created_at', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchSupplier . '%')
            ->paginate(env('PAGINATE_XXL'));






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.suppliers', compact('suppliers'));


    } // end function


} // end class
