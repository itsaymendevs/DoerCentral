<?php

namespace App\Livewire\Website\Plans;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\MenuCalendarScheduleMeal;
use App\Models\Plan;
use App\Models\SubscriptionSetting;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Component;

class SinglePlan extends Component
{


    use HelperTrait;


    // :: variables
    public $plan, $meals;





    public function mount($name)
    {



        // 1: getPlan
        $this->plan = Plan::where('nameURL', $name)->first();



        // 2: meals
        $mealTypes = MealType::whereIn('shortName', ['B', 'L', 'D', 'S', 'SDE', 'DRK'])->pluck('id')->toArray();

        $scheduleMeals = MenuCalendarScheduleMeal::where('scheduleDate', '>=', $this->getCurrentDate())
                ?->whereIn('mealTypeId', $mealTypes)
                ?->where('menuCalendarId', $this->plan?->defaultCalendar()?->menuCalendarId)
                ?->pluck('mealId')?->toArray();



        $this->meals = Meal::whereIn('id', $scheduleMeals)?->orderBy('updated_at', 'desc')->get();







    } // end function









    // ----------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $customFiles = [];
        $types = Type::whereNotIN('name', ['Sub-recipe', 'Meal'])->get();
        $settings = SubscriptionSetting::first();






        // 1.2: customFiles
        $settings?->planCustomSectionImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionImageFile, $settings?->planCustomSectionSubtitle ?? null, $settings?->planCustomSectionCaption ?? null]) : null;


        $settings?->planCustomSectionSecondImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionSecondImageFile, $settings?->planCustomSectionSecondSubtitle ?? null, $settings?->planCustomSectionSecondCaption ?? null]) : null;


        $settings?->planCustomSectionThirdImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionThirdImageFile, $settings?->planCustomSectionThirdSubtitle ?? null, $settings?->planCustomSectionThirdCaption ?? null]) : null;


        $settings?->planCustomSectionFourthImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionFourthImageFile, $settings?->planCustomSectionFourthSubtitle ?? null, $settings?->planCustomSectionFourthCaption ?? null]) : null;



        $settings?->planCustomSectionFifthImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionFifthImageFile, $settings?->planCustomSectionFifthSubtitle ?? null, $settings?->planCustomSectionFifthCaption ?? null]) : null;



        $settings?->planCustomSectionSixthImageFile ?
            array_push($customFiles, [$settings?->planCustomSectionSixthImageFile, $settings?->planCustomSectionSixthSubtitle ?? null, $settings?->planCustomSectionSixthCaption ?? null]) : null;




        return view('livewire.website.plans.single-plan', compact('types', 'settings', 'customFiles'));




    } // end function




} // end class
