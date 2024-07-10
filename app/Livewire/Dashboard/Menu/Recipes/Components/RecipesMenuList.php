<?php

namespace App\Livewire\Dashboard\Menu\Recipes\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class RecipesMenuList extends Component
{


    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public MealForm $instance;







    #[On('editMenuList')]
    public function remount($id)
    {


        // 1: get instance
        $meal = Meal::find($id);

        foreach ($meal->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.2: convertBoolean
        $this->instance->isForVIP = boolval($this->instance->isForVIP);
        $this->instance->isForMenu = boolval($this->instance->isForMenu);
        $this->instance->isForAddons = boolval($this->instance->isForAddons);
        $this->instance->isForCatering = boolval($this->instance->isForCatering);


    } // end function









    // ----------------------------------------------------------------







    public function update()
    {



        // 1: makeRequest
        if ($this->instance) {

            $response = $this->makeRequest('dashboard/menu/meals/lists/update', $this->instance);

            $this->dispatch('refreshViews');


        } // end if




    } // end function










    // ----------------------------------------------------------------







    public function render()
    {

        return view('livewire.dashboard.menu.recipes.components.recipes-menu-list');

    } // end function




} // end function


