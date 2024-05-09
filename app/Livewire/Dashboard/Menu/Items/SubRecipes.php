<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class SubRecipes extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithPagination;




    // :: variables
    public $searchSubRecipe = '';
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
            $subRecipe = Meal::find($this->removeId);
            $this->removeFile($subRecipe->imageFile, 'menu/meals');
            $this->removeFile($subRecipe->secondImageFile, 'menu/meals');

            $subRecipe->thirdImageFile ? $this->removeFile($subRecipe->thirdImageFile, 'menu/meals') : null;
            $subRecipe->fourthImageFile ? $this->removeFile($subRecipe->fourthImageFile, 'menu/meals') : null;



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed sub-recipe {$subRecipe->name}");




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
        $type = Type::where('name', 'Sub-recipe')->first();

        $subRecipes = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSubRecipe . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'));





        // :: overview
        $totalSubRecipes = Meal::where('typeId', $type->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sub-recipes', compact('subRecipes', 'totalSubRecipes'));

    } // end function



} // end class

