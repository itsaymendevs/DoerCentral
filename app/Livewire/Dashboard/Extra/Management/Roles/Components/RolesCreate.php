<?php

namespace App\Livewire\Dashboard\Extra\Management\Roles\Components;

use App\Livewire\Forms\RoleForm;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\HelperTrait;
use Livewire\Component;

class RolesCreate extends Component
{


    use HelperTrait;


    // :: variable
    public RoleForm $instance;








    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: filter
        $this->instance->permissions = array_filter($this->instance->permissions ?? [], function ($item) {
            return $item === true;
        });




        // 2: validate - getKeys
        $this->instance->validate();
        $this->instance->permissions = array_keys($this->instance->permissions);





        // --------------------------------
        // --------------------------------







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/management/roles/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-role .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function












    // --------------------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $permissions = Permission::all();






        return view('livewire.dashboard.extra.management.roles.components.roles-create', compact('permissions'));

    } // end function


} // end class
