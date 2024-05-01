<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerMenu\Components;

use App\Models\Customer;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\MenuCalendarScheduleMeal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;

class SingleCustomerMenuReplaceMeal extends Component
{


    use HelperTrait;
    use WithPagination;



    // :: variables
    public $customer, $subscription;
    public $scheduleMeal, $subscriptionDefaultMeal, $mealType;
    public $searchMeal = '';







    public function mount($id)
    {


        // :: getCustomer - subscription
        $this->customer = Customer::find($id);
        $this->subscription = $this->customer?->currentSubscription();




    } // end function












    // -----------------------------------------------------------











    #[On('replaceMeal')]
    public function remount($scheduleMealId)
    {



        // 1: get scheduleMeal
        $this->scheduleMeal = MenuCalendarScheduleMeal::find($scheduleMealId);



        // 1.2: getScheduleMeals - byMealType
        $this->mealType = MealType::find($this->scheduleMeal->mealTypeId);





        // ---------------------------------
        // ---------------------------------







        // 1.2: subscriptionDefaultMeal
        $subscriptionSchedule = CustomerSubscriptionSchedule::where('customerSubscriptionId', $this->subscription->id)->where('scheduleDate', session('customerScheduleDate'))->first();



        $this->subscriptionDefaultMeal = $subscriptionSchedule->meals?->where('mealTypeId', $this->mealType->id)->first();



    } // end function










    // -----------------------------------------------------------










    public function viewReplacementExcludes($id)
    {


        // 1: dispatchId
        $this->dispatch('viewReplacementExcludes', $id);


    } // end function












    // -----------------------------------------------------------









    public function replace($id)
    {





        // 1: create instance
        $instance = new stdClass();



        // 1.2: general
        $instance->replacementId = $id;
        $instance->mealTypeId = $this->mealType?->id;
        $instance->mealId = $this->scheduleMeal->mealId;
        $instance->scheduleDate = session('customerScheduleDate') ?? $this->subscription->startDate;


        // 1.3: customer - subscription
        $instance->customerId = $this->subscription?->customerId;
        $instance->customerSubscriptionId = $this->subscription?->id;







        // ----------------------------------------
        // ----------------------------------------







        // :: exists
        if ($instance->mealId) {




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/customers/menu/meals/replace', $instance);




            // :: refresh / closeModal
            $this->dispatch('refreshViews');

            $this->dispatch('closeModal', modal: '#meal-replacement .btn--close');
            $this->makeAlert('success', $response->message);


        } // end if







    } // end function











    // -----------------------------------------------------------






    public function render()
    {



        // 1: dependencies



        // 1.1: Recipe Type
        if ($this?->mealType?->type?->name == 'Recipe') {



            // :: prepParams
            $mealTypeId = $this?->mealType->id;


            $meals = Meal::whereHas('types', function ($query) use ($mealTypeId) {
                $query->whereIn('mealTypeId', [$mealTypeId]);
            })
                ->where('id', '!=', $this->scheduleMeal?->mealId)
                ->where('id', '!=', $this->subscriptionDefaultMeal?->mealId)
                ->where('typeId', $this?->mealType?->type?->id)
                ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
                ->paginate(4, pageName: 'replacements');




            // 1.2: others
        } else {



            $meals = Meal::where('id', '!=', $this->scheduleMeal?->mealId)
                ->where('id', '!=', $this->subscriptionDefaultMeal?->mealId)
                ->where('typeId', $this?->mealType?->type?->id)
                ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
                ->paginate(4, pageName: 'replacements');




        } // end if



        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-menu.components.single-customer-menu-replace-meal', compact('meals'));


    } // end function





} // end class
