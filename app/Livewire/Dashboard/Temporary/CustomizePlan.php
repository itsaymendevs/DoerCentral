<?php

namespace App\Livewire\Dashboard\Temporary;

use App\Models\Cuisine;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\Tag;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('livewire.layouts.temporary')]
class CustomizePlan extends Component
{


    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchMealType, $searchCuisine, $searchTag;
    public $tags, $cuisines, $mealTypes, $types;




    public function mount()
    {



        // 1: dependencies
        $this->tags = Tag::all();
        $this->cuisines = Cuisine::all();
        $this->mealTypes = MealType::all();
        $this->types = Type::whereIn('name', ['Recipe', 'Snack', 'Side', 'Drink'])->get();




    } // end function








    // --------------------------------------------------------------------------







    public function render()
    {



        // 1: dependencies



        // 1.2: getRecipes - snacks - sides - drinks
        $recipes = Meal::where('typeId', $this->types->where('name', 'Recipe')->first()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'), pageName: 'meals');



        $sides = Meal::where('typeId', $this->types->where('name', 'Side')->first()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'), pageName: 'sides');




        $drinks = Meal::where('typeId', $this->types->where('name', 'Drink')->first()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'), pageName: 'drinks');



        $snacks = Meal::where('typeId', $this->types->where('name', 'Snack')->first()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'), pageName: 'snacks');








        // -------------------------------------------------
        // -------------------------------------------------





        // 2: combine
        $combine = [];


        $recipes->count() > 0 ? $combine[$recipes->first()->typeId] = $recipes : null;
        $snacks->count() > 0 ? $combine[$snacks->first()->typeId] = $snacks : null;
        $sides->count() > 0 ? $combine[$sides->first()->typeId] = $sides : null;
        $drinks->count() > 0 ? $combine[$drinks->first()->typeId] = $drinks : null;








        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.temporary.customize-plan', compact('recipes', 'snacks', 'sides', 'drinks', 'combine'));




    } // end function





} // end class
