<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Meals extends Component
{


    use HelperTrait;
    use WithPagination;


    // :: variables
    public $searchMeal = '';
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

        $this->makeAlert('remove', null, 'confirmMealRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmMealRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $meal = Meal::find($this->removeId);
            $this->removeFile($meal->imageFile, 'menu/meals');
            $this->removeFile($meal->secondImageFile, 'menu/meals');

            $meal->thirdImageFile ? $this->removeFile($meal->thirdImageFile, 'menu/meals') : null;
            $meal->fourthImageFile ? $this->removeFile($meal->fourthImageFile, 'menu/meals') : null;




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
        $type = Type::where('name', 'Meal')->first();

        $meals = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'));









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.meals', compact('meals'));


    } // end function







} // end class



