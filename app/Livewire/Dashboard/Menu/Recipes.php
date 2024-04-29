<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Recipes extends Component
{

    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchRecipe = '';
    public $removeId;








    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmRecipeRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmRecipeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $recipe = Meal::find($this->removeId);
            $this->removeFile($recipe->imageFile, 'menu/meals');
            $this->removeFile($recipe->secondImageFile, 'menu/meals');

            $recipe->thirdImageFile ? $this->removeFile($recipe->thirdImageFile, 'menu/meals') : null;
            $recipe->fourthImageFile ? $this->removeFile($recipe->fourthImageFile, 'menu/meals') : null;




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/meals/remove', $this->removeId);

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
        $type = Type::where('name', 'Recipe')->first();

        $meals = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchRecipe . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.recipes', compact('meals'));

    } // end function



} // end class



