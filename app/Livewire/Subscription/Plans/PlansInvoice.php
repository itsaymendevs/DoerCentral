<?php

namespace App\Livewire\Website\Plans;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Lead;
use App\Models\Profile;
use App\Models\Social;
use App\Models\SubscriptionFormSetting;
use App\Traits\HelperTrait;
use App\Traits\MailTrait;
use App\Traits\PaymenntTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Illuminate\Http\Request;
use Livewire\Component;
use stdClass;


#[Layout('livewire.layouts.plans-customization')]
class PlansInvoice extends Component
{


    use HelperTrait;
    use PaymenntTrait;
    use MailTrait;







    // :: variables
    public SubscriptionForm $instance;

    public $customer, $subscription;







    public function mount(Request $request)
    {





        // 1: checkPayment - removeSessions
        Session::forget('customer');
        Session::forget('pre-customer');

        $isPaymentDone = $this->checkCheckoutPaymennt($request?->checkout);




        // 1.2: notPaid
        if (! $isPaymentDone) {


            return $this->redirect(route('website.plans'));


        } // end if











        // ------------------------------------------------
        // ------------------------------------------------









        // 2: getLead
        $lead = Lead::where('paymentReference', $request?->checkout)?->latest()?->first() ?? null;





        // 2.1: isFound
        if ($lead) {





            // 2.2: isPending
            if (! $lead->isPaymentDone) {



                // 2.3: create instance
                $instance = new stdClass();
                $instance->id = $lead->id;



                // 2.4: updatePayment / restructure
                $response = $this->makeRequest('subscription/lead/convert', $instance);
                $lead = $response->lead;



                if (empty($lead)) {

                    return $this->redirect(route('website.plans'));

                } // end if








                // ------------------------------------------
                // ------------------------------------------








                // 2.5: regular - existing
                if (! $lead->isExistingCustomer) {

                    $response = $this->makeRequest('subscription/customer/store', $lead);

                } else {


                    $lead->deliveryDays = null;
                    $lead->useWallet = false;
                    $lead->walletDiscountPrice = null;

                    $response = $this->makeRequest('subscription/customer/existing/store', $lead);


                } // end if









                // ------------------------------------------
                // ------------------------------------------









                // 2.6: sendMail
                $subscription = CustomerSubscription::where('paymentReference', $lead->paymentReference)->latest()->first();

                // $this->sendInvoiceMail($subscription->id, $subscription->customer->fullEmail());



            } // end if - isPending









            // 3: notFound
        } else {



            return $this->redirect(route('website.plans'));



        } // end if










        // ------------------------------------------
        // ------------------------------------------








        // 3: dependencies
        $this->subscription = CustomerSubscription::where('paymentReference', $lead->paymentReference)->latest()->first();
        $this->customer = $this->subscription->customer;






    } // end function










    // --------------------------------------------------------------











    public function render()
    {


        // 1: dependencies
        $socials = Social::first();
        $profile = Profile::first();
        $settings = CustomerSubscriptionSetting::first();
        $formSettings = SubscriptionFormSetting::first();




        return view('livewire.website.plans.plans-invoice', compact('profile', 'socials', 'settings', 'formSettings'));


    } // end function






} // end class
