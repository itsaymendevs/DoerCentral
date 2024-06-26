<?php

namespace App\Livewire\Dashboard\Menu\Items\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemsMenuList extends Component
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
        $this->instance->isForAddons = boolval($this->instance->isForAddons);
        $this->instance->isForMenu = boolval($this->instance->isForMenu);



    } // end function









    // ----------------------------------------------------------------







    public function update()
    {



        // 1: makeRequest
        if ($this->instance) {

            $response = $this->makeRequest('dashboard/menu/meals/lists/update', $this->instance);

            $this->makeAlert('info', $response->message);
            $this->dispatch('refreshViews');


        } // end if




    } // end function










    // ----------------------------------------------------------------







    public function render()
    {

        return view('livewire.dashboard.menu.items.components.items-menu-list');

    } // end function




} // end function
