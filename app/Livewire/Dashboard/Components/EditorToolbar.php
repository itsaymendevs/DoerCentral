<?php

namespace App\Livewire\Dashboard\Components;

use Livewire\Component;

class EditorToolbar extends Component
{


    // :: variables
    public $id;





    public function mount($id)
    {


        // 1: params
        $this->id = $id;


    } // end function








    // --------------------------------------------------------------








    public function render()
    {

        return view('livewire.dashboard.components.editor-toolbar');

    } // end function


} // end class
