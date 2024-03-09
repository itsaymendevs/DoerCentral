<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Sauces extends Component
{
    use HelperTrait;


    // :: variables
    public $searchSauce = '';







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Sauce')->first();

        $sauces = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSauce . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sauces', compact('sauces'));

    } // end function



} // end class

