<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Blog;
use App\Models\Customer;
use App\Models\CustomerSubscriptionSchedule;
use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;


#[Layout('livewire.layouts.portals.customer.dashboard')]
class CustomerHome extends Component
{



    use HelperTrait;


    // :: variables
    public $customer, $latestSubscription;








    public function mount()
    {


        // :: getCustomer - latestSubscription
        $this->customer = Customer::find(session('customerId'));
        $this->latestSubscription = $this->customer->latestSubscription();





    } // end function

















    // -----------------------------------------------------------










    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $blogs = Blog::where('isForWebsite', true)->orderBy('publishDate', 'desc')->get();






        // 2: todayMeals




        // 2.1: getSchedule
        $schedule = CustomerSubscriptionSchedule::where('customerId', $this->customer->id)
            ->where('scheduleDate', $this->getCurrentDate())->first();


        $scheduleMeals = $schedule?->meals?->whereNotNull('mealId')?->pluck('mealId')?->toArray() ?? [];




        // 2.2: todayMeals
        $todayMeals = Meal::whereIn('id', $scheduleMeals)->get();







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.customer-portal.customer-home', compact('todayMeals', 'blogs'));


    } // end function




} // end class


