<?php

namespace App\Livewire\Dashboard\Menu\Recipes\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Models\Menu;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class RecipesMenuList extends Component
{


    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public $id;







    #[On('editMenuList')]
    public function remount($id)
    {


        // 1: get instance
        $this->id = $id;



    } // end function









    // ----------------------------------------------------------------







    public function update($menu)
    {



        // 1: makeRequest
        if ($menu && $this->id) {


            // 1.2: create instance
            $instance = new stdClass();

            $instance->menuId = $menu;
            $instance->mealId = $this->id;





            // 1.3: makeRequest
            $response = $this->makeRequest('dashboard/menu/meals/lists/update', $instance);

            $this->dispatch('refreshViews');


        } // end if



    } // end function










    // ----------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $menus = Menu::all();
        $meal = $this->id ? Meal::find($this->id) : null;




        return view('livewire.dashboard.menu.recipes.components.recipes-menu-list', compact('menus', 'meal'));



    } // end function




} // end function
