<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Components;

use Livewire\Component;

class SubMenu extends Component
{



    // :: variables
    public $id;




    public function mount($id)
    {


        // :: params
        $this->id = $id;

    } // end function






    // ------------------------------------------------------------------







    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.manage.components.sub-menu');

    } // end function


} // end class
