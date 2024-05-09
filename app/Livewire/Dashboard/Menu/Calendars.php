<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\MenuCalendar;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Calendars extends Component
{
    use HelperTrait;
    use ActivityTrait;


    // ::variables
    public $searchCalendar = '';
    public $removeId;








    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editCalendar', $id);


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

        $this->makeAlert('remove', null, 'confirmCalendarRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmCalendarRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            // :: get instance - removeFile
            $calendar = MenuCalendar::find($this->removeId);
            $this->removeFile($calendar->imageFile, 'menu/calendars');




            // ## log - activity ##
            $this->storeActivity('Menu', "Removed calendar {$calendar->name}");





            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/calendars/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if






        // 1.2: renderView
        $this->render();


    } // end function









    // ---------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $calendars = MenuCalendar::where('name', 'LIKE', '%' . $this->searchCalendar . '%')->get();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.calendars', compact('calendars'));

    } // end function



} // end class

