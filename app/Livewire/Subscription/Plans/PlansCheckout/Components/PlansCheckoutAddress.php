<?php

namespace App\Livewire\Website\Plans\PlansCheckout\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\City;
use App\Models\CityHoliday;
use App\Models\CustomerSubscriptionSetting;
use App\Models\SubscriptionFormSetting;
use App\Traits\HelperTrait;
use Livewire\Component;

class PlansCheckoutAddress extends Component
{


    use HelperTrait;


    // :: variables
    public $minimumDeliveryDays;
    public SubscriptionForm $instance;





    public function mount()
    {

        // 1: minimumDays
        $this->minimumDeliveryDays = CustomerSubscriptionSetting::first()?->minimumDeliveryDays ?? 1;


    } // end function











    // ----------------------------------------------------------------










    public function confirm()
    {



        // 1: getDeliveryDays
        $deliveryDays = array_filter((array) $this->instance->deliveryDays ?? [], function ($value, $key) {

            return $value == true;

        }, ARRAY_FILTER_USE_BOTH);







        // 1.2: validate
        if (count($deliveryDays) < $this->minimumDeliveryDays) {


            $this->makeAlert('info', 'Please select your delivery days');

            return false;


        } // end if







        // 1.3: confirm
        $this->instance->deliveryDays = array_keys($deliveryDays ?? []);








        // --------------------------------------------------------------------
        // --------------------------------------------------------------------







        // 1: dispatchEvent
        $this->dispatch('confirmAddress', $this->instance);
        $this->dispatch('closeModal', modal: '#address--modal .btn--close');




    } // end function







    // --------------------------------------------------------------------









    public function render()
    {



        // 1: dependencies
        $cities = City::all();
        $settings = SubscriptionFormSetting::first();





        // ------------------------------------------
        // ------------------------------------------





        // 2: weekDays
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];






        // 2: getHolidays
        $holidayWeekDays = CityHoliday::where('cityId', 1)->where('isActive', 1)
                ?->get()?->pluck('weekday')?->toArray() ?? [];






        // 2.1: loop - removeHolidays
        foreach ($holidayWeekDays as $holidayWeekDay) {

            if (($key = array_search($holidayWeekDay, $weekDays)) !== false)
                unset($weekDays[$key]);

        } // end loop










        return view('livewire.website.plans.plans-checkout.components.plans-checkout-address', compact('cities', 'weekDays', 'settings'));



    } // end function








} // end class
