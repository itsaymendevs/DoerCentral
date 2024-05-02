<?php

namespace App\Livewire\Dashboard\Extra\Management\Users\Components;

use App\Livewire\Forms\RoleForm;
use App\Livewire\Forms\UserForm;
use App\Models\Role;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variable
    public UserForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();





        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'extra/management/users');





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/management/users/store', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-user .btn--close');
        $this->dispatch('resetFile', file: 'user--file-1', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function












    // --------------------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $roles = Role::all();






        return view('livewire.dashboard.extra.management.users.components.users-create', compact('roles'));

    } // end function


} // end class

