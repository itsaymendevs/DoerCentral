<?php

namespace App\Livewire\Dashboard\Stock\Items;

use App\Models\Label;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemsLabels extends Component
{


    use HelperTrait;


    // :: variables
    public $searchLabel;








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

        $this->makeAlert('remove', null, 'confirmLabelRemove');



    } // end function







    // -----------------------------------------------------------







    #[On('confirmLabelRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/stock/items/labels/remove', $this->removeId);
            $this->makeAlert('info', $response->message);




            // 1.2: renderViews
            $this->dispatch('refreshViews');


        } // end if





    } // end function









    // -----------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $labels = Label::orderBy('created_at', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchLabel . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.items.items-labels', compact('labels'));



    } // end function




} // end class
