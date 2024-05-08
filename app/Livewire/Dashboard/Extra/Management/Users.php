<?php

namespace App\Livewire\Dashboard\Extra\Management;

use App\Models\User;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Users extends Component
{



    use HelperTrait;


    // :: variables
    public $searchUser = '';
    public $removeId;








    public function edit($id)
    {



        // 1: dispatchId
        $this->dispatch('editUser', $id);



    } // end function






    // --------------------------------------------------------------








    public function toggle($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/management/users/toggle', $id);




        // :: refreshViews
        $this->render();
        $this->makeAlert('success', $response->message);



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

        $this->makeAlert('remove', null, 'confirmUserRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmUserRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            // :: get instance - removeFile
            $user = User::find($this->removeId);


            $this->removeFile($user->imageFile, 'extra/management/users');
            $response = $this->makeRequest('dashboard/extra/management/users/remove', $this->removeId);


            $this->makeAlert('info', $response->message);

        } // end if






        // 1.2: renderView
        $this->render();


    } // end function











    // -----------------------------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        // ** 1st for Admin
        $users = User::where('id', '!=', 1)->where('name', 'LIKE', '%' . $this->searchUser . '%')->get();





        // :: init tooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.management.users', compact('users'));


    } // end function



} //end class
