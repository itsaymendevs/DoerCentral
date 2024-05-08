<?php

namespace App\Livewire\Dashboard\Extra\Management\Roles\Components;

use App\Livewire\Forms\RoleForm;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RolesEdit extends Component
{
    use HelperTrait;


    // :: variable
    public RoleForm $instance;








    #[On('editRole')]
    public function remount($id)
    {


        // :: reset
        $this->instance->reset();





        // 1: get instance
        $role = Role::find($id);


        foreach ($role->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.2: permissions
        foreach ($role?->permissions ?? [] as $permission)
            $this->instance->permissions[$permission->permissionId] = true;





    } // end function











    // --------------------------------------------------------------------












    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

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
        $response = $this->makeRequest('dashboard/extra/management/roles/update', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-role .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function












    // --------------------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $permissions = Permission::all();






        return view('livewire.dashboard.extra.management.roles.components.roles-edit', compact('permissions'));

    } // end function


} // end class
