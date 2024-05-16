<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Recipes extends Component
{

    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variables
    public $searchRecipe = '', $searchMealType;
    public $removeId;








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






            // ## log - activity ##
            $this->storeActivity('Menu', "Removed recipe {$recipe->name}");





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
        $mealTypes = MealType::where('typeId', $type->id)->get();





        // 1.2: filter
        if ($this->searchMealType) {


            $meals = Meal::whereHas('types', function ($query) {
                $query->where('mealTypeId', $this->searchMealType);
            })
                ->where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchRecipe . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));




            // 1.2: regular
        } else {

            $meals = Meal::where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchRecipe . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));


        } // end if








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.recipes', compact('meals', 'mealTypes'));

    } // end function



} // end class



