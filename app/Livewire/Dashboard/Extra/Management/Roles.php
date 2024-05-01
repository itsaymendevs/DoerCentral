<?php

namespace App\Livewire\Dashboard\Extra\Management;

use App\Models\Role;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Roles extends Component
{


    use HelperTrait;



    // :: variables
    public $searchRole = '';
    public $removeId;








    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editRole', $id);


    } // end function








    // --------------------------------------------------------------










    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmRoleRemove');



    } // end function







    // -----------------------------------------------------------------------------







    #[On('confirmRoleRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/extra/management/roles/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if




        // 1.2: refreshViews
        $this->dispatch('refreshViews');



    } // end function








    // --------------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $roles = Role::where('name', 'LIKE', '%' . $this->searchRole . '%')->get();



        // :: init tooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.management.roles', compact('roles'));

    } // end function





} // end class
