<?php

namespace App\Livewire\CustomerPortal\CustomerMenu\Components;

use App\Models\Customer;
use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerMenuReplaceMealExcludes extends Component
{



    use HelperTrait;



    // :: variables
    public $customer, $meal;
    public $allergyIngredients, $excludeIngredients;






    public function mount()
    {


        // :: getCustomer
        $this->customer = Customer::find(session('customerId'));



    } // end function











    // -----------------------------------------------------------












    #[On('viewReplacementExcludes')]
    public function remount($mealId)
    {



        // 1: get allergiesIngredients - excludesIngredients
        $this->meal = Meal::find($mealId);
        $combined = $this->customer->checkMealCompatibility($this->meal->id);


        $this->excludeIngredients = $combined?->excludeIngredients ?? [];
        $this->allergyIngredients = $combined?->allergyIngredients ?? [];



    } // end function













    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-menu.components.customer-menu-replace-meal-excludes');


    } // end function





} // end class
