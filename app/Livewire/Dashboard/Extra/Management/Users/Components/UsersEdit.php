<?php

namespace App\Livewire\Dashboard\Extra\Management\Users\Components;

use App\Livewire\Forms\UserForm;
use App\Models\Role;
use App\Models\User;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersEdit extends Component
{

    use HelperTrait;
    use WithFileUploads;




    // :: variable
    public UserForm $instance;








    #[On('editUser')]
    public function remount($id)
    {


        // :: reset
        $this->instance->reset();




        // 1: get instance
        $user = User::find($id);


        foreach ($user->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        $this->instance->imageFileName = $this->instance->imageFile;







        // ------------------------------------------
        // ------------------------------------------





        // 1.2: setFilePreview
        $preview = asset('storage/extra/management/users/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'user--preview-2', defaultPreview: $preview);




        // 1.3: roleSelect
        $this->dispatch('setSelect', id: '#role-select-2', value: $this->instance->roleId);





    } // end function











    // --------------------------------------------------------------------














    public function update()
    {



        // :: validate
        $this->instance->validate();





        // 1: replaceFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'extra/management/users', $this->instance->imageFileName, 'USR');





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/management/users/update', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-user .btn--close');
        $this->dispatch('resetFile', file: 'user--file-2', defaultPreview: $this->getDefaultPreview());


        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function












    // --------------------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $roles = Role::all();



        return view('livewire.dashboard.extra.management.users.components.users-edit', compact('roles'));

    } // end function


} // end class

