<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Models\MealInstruction;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderViewInstruction extends Component
{

    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $instruction, $counter;
    public $mealInstruction;
    public $removeId;






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





        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->mealInstruction->id;
        $instance->instruction = $this->instruction;




        // :: notEmpty
        if ($this->instruction) {


            // ## log - activity ##
            $this->storeActivity('Menu', "Updated instruction for {$this->mealInstruction->meal->name}");





            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/instructions/update', $instance);



            // :: alert
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



        // 1: remove
        if ($this->removeId) {



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed instruction for {$this->mealInstruction->meal->name}");



            // 1.2: makeInstruction
            $response = $this->makeRequest('dashboard/menu/builder/instructions/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if





        // 1.2: renderParent
        $this->dispatch('refreshInstructions');


    } // end function









    // -----------------------------------------------------------------













    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-view-instruction');


    } // end function


} // end class

