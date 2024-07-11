<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageInstructions extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $meal, $instruction;





    public function mount($id)
    {


        // 1: get instance
        $this->meal = Meal::find($id);



    } // end function









    // -----------------------------------------------------








    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->instruction = $this->instruction;



        if ($this->instruction) {



            // ## log - activity ##
            $this->storeActivity('Menu', "Created instruction for {$this->meal->name}");




            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/instructions/store', $instance);




            // 1.2: reset
            $this->instruction = null;

            $this->makeAlert('success', $response->message);
            $this->render();



        } // end if




    } // end function











    // -----------------------------------------------------











    #[On('refreshInstructions')]
    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-instructions');


    } // end function







} // end class
