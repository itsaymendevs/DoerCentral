<?php

namespace App\Livewire\Dashboard\ManageKitchen;

use App\Models\Label;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class KitchenLabels extends Component
{


    use HelperTrait;


    // :: variables
    public $removeId;






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


            $response = $this->makeRequest('dashboard/kitchen/labels/remove', $this->removeId);
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
        $labels = Label::all();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.manage-kitchen.kitchen-labels', compact('labels'));



    } // end function




} // end class
