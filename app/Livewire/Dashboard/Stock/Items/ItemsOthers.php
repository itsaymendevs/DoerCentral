<?php

namespace App\Livewire\Dashboard\Stock\Items;

use App\Models\Item;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ItemsOthers extends Component
{


    use HelperTrait;


    // :: variables
    public $searchItem;





    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editItem', $id);



    } // end function











    // -----------------------------------------------------------







    public function updateCharge($id, $charge)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: create instance
        $instance = new stdClass();

        $instance->id = $id;
        $instance->charge = $charge ?? null;



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/items/others/charge/update', $instance);


        // :: render - alert
        $this->makeAlert('success', $response->message);
        $this->render();






    } // end function












    // -----------------------------------------------------------








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

        $this->makeAlert('remove', null, 'confirmItemsRemove');



    } // end function









    // -----------------------------------------------------------









    #[On('confirmItemsRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/stock/items/others/remove', $this->removeId);
            $this->makeAlert('info', $response->message);




            // 1.2: renderViews
            $this->dispatch('refreshViews');


        } // end if





    } // end function













    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $items = Item::orderBy('created_at', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchItem . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-others', compact('items'));


    } // end function





} // end class
