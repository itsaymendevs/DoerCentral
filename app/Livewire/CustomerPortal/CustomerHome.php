<?php

namespace App\Livewire\CustomerPortal;

use App\Models\Blog;
use App\Models\Customer;
use App\Models\CustomerSubscriptionDelivery;
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
    public $customer, $customerAddress;
    public $latestSubscription;







    public function mount()
    {


        // :: getCustomer - latestSubscription
        $this->customer = Customer::find(session('customerId'));
        $this->latestSubscription = $this->customer->currentSubscription();



        // :: getCustomerAddress
        $this->customerAddress = $this->customer->addressByDay($this->getCurrentDate());





    } // end function














    // -----------------------------------------------------------










    public function viewMeal($id)
    {


        // 1: dispatchId
        $this->dispatch('viewMeal', $id);


    } // end function









    // -----------------------------------------------------------










    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $blogs = Blog::where('isForWebsite', true)->orderBy('publishDate', 'desc')->get();
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;






        // 2: todayMeals




        // 2.1: getDelivery / getSchedule
        $delivery = CustomerSubscriptionDelivery::orderBy('deliveryDate')
                ?->where('customerId', $this->customer->id)
                ?->where('deliveryDate', $this->getCurrentDate())
                ?->first();




        $schedule = CustomerSubscriptionSchedule::where('customerSubscriptionDeliveryId', $delivery?->id)
            ->where('scheduleDate', $this->getCurrentDate())->first();


        $scheduleMeals = $schedule?->meals;









        // 2.2: getTotalMacros
        foreach ($scheduleMeals ?? [] as $scheduleMeal) {



            // :: sumAll
            $totalCalories += $scheduleMeal?->mealSize()?->afterCookCalories ?? 0;
            $totalProteins += $scheduleMeal?->mealSize()?->afterCookProteins ?? 0;
            $totalCarbs += $scheduleMeal?->mealSize()?->afterCookCarbs ?? 0;
            $totalFats += $scheduleMeal?->mealSize()?->afterCookFats ?? 0;


        } // end loop











        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.customer-portal.customer-home', compact('blogs', 'scheduleMeals', 'totalCalories', 'totalProteins', 'totalCarbs', 'totalFats'));


    } // end function




} // end class


