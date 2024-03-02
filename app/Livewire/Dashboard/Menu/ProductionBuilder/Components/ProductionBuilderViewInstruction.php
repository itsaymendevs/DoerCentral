<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Models\MealInstruction;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderViewInstruction extends Component
{

    use HelperTrait;



    // :: variables
    public $instruction;
    public $mealInstruction;
    public $removeId;






    public function mount($id)
    {

        // 1: get instance
        $this->mealInstruction = MealInstruction::find($id);
        $this->instruction = $this->mealInstruction->content;


    } // end function







    // -----------------------------------------------------








    public function update()
    {


        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->mealInstruction->id;
        $instance->instruction = $this->instruction;




        // :: notEmpty
        if ($this->instruction) {


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

