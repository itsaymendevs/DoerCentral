<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;

class Lists extends Component
{


    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variables
    public $menu;
    public $searchType, $searchMeal = '';







    public function mount($name)
    {


        // 1: get instance
        $this->menu = Menu::where('nameURL', $name)->first();



    } // end function








    // ----------------------------------------------------------------











    public function toggleMenu($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: params - confirmationBox
        $this->temporaryId = $id;

        $this->makeAlert('question', 'Proceed with removing item from menu?', 'confirmToggleMenu');



    } // end function







    // -----------------------------------------------------------------------------








    #[On('confirmToggleMenu')]
    public function confirmToggleMenu()
    {


        // 1.2: create instance
        $instance = new stdClass();

        $instance->menuId = $this->menu->id;
        $instance->mealId = $this->temporaryId;




        // 1.3: makeRequest
        $response = $this->makeRequest('dashboard/menu/meals/lists/update', $instance);

        $this->dispatch('refreshViews');





    } // end function










    // ----------------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $types = Type::where('name', '!=', 'Sub-recipe')->get();







        // 1.2: filter
        if ($this->searchType) {


            $meals = Meal::where('typeId', $this->searchType)
                ->whereIn('id', $this->menu?->meals?->pluck('mealId')?->toArray() ?? [])
                ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));



            // 1.2: regular
        } else {

            $meals = Meal::whereIn('id', $this->menu?->meals?->pluck('mealId')?->toArray() ?? [])
                ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));


        } // end if








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.lists', compact('meals', 'types'));


    } // end function



} // end class
