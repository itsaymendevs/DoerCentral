<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageInstructions\Components;

use App\Models\MealInstruction;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageInstructionsEdit extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $instruction, $counter, $mealInstruction;






    public function mount($id, $counter)
    {


        // 1: get instance
        $this->mealInstruction = MealInstruction::find($id);
        $this->instruction = $this->mealInstruction->content;
        $this->counter = $counter;



    } // end function







    // -----------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if






        // --------------------------------------
        // --------------------------------------







        // 1: create instance
        $instance = new stdClass();
        $instance->id = $this->mealInstruction->id;
        $instance->instruction = $this->instruction;





        if ($this->instruction) {


            // ## log - activity ##
            $this->storeActivity('Menu', "Updated instruction for {$this->mealInstruction->meal->name}");





            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/instructions/update', $instance);

            $this->makeAlert('success', $response->message);




        } // end if



    } // end function











    // -----------------------------------------------------







    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmInstructionRemove');



    } // end function







    // -----------------------------------------------------








    #[On('confirmInstructionRemove')]
    public function confirmRemove()
    {



        if ($this->removeId) {



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed instruction for {$this->mealInstruction->meal->name}");




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/instructions/remove', $this->removeId);



        } // end if






        // 1.3: renderParent
        $this->dispatch('refreshInstructions');




    } // end function











    // -----------------------------------------------------------------













    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-instructions.components.production-builder-manage-instructions-edit');



    } // end function





} // end class
