<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerMenu\Components;

use App\Models\Customer;
use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerMenuViewExcludes extends Component
{


    use HelperTrait;



    // :: variables
    public $customer, $meal;
    public $allergyIngredients, $excludeIngredients;






    public function mount($id)
    {


        // :: getCustomer
        $this->customer = Customer::find($id);



    } // end function











    // -----------------------------------------------------------












    #[On('viewExcludes')]
    public function remount($mealId)
    {



        // 1: get allergiesIngredients - excludesIngredients
        $this->meal = Meal::find($mealId);
        $combined = $this->customer->checkMealCompatibility($this->meal->id);


        $this->excludeIngredients = $combined?->excludeIngredients ?? [];
        $this->allergyIngredients = $combined?->allergyIngredients ?? [];


        dd($this->allergyIngredients);


    } // end function













    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-menu.components.single-customer-menu-view-excludes');


    } // end function





} // end class
