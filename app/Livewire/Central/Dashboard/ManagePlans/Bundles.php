<?php

namespace App\Livewire\Central\Dashboard\ManagePlans;

use App\Models\Bundle;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Bundles extends Component
{


    use HelperTrait;


    // :: variables
    public $searchBundle = '';





    public function edit($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editBundle', $id);



    } // end function









    // -----------------------------------------------------------









    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmBundleRemove');



    } // end function







    // -----------------------------------------------------------







    #[On('confirmBundleRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {


            Bundle::find($this->removeId)->delete();

            $this->makeAlert('info', 'Bundle has been removed');
            $this->render();


        } // end if


    } // end function













    // -----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $bundles = Bundle::where('name', 'LIKE', value: '%' . $this->searchBundle . '%')?->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.manage-plans.bundles', compact('bundles'));



    } // end function




} // end class
