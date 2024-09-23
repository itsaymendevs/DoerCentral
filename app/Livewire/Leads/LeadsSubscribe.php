<?php

namespace App\Livewire\Leads;

use App\Livewire\Forms\ClientLeadForm;
use App\Models\ClientLead;
use App\Models\CountryCode;
use App\Models\Feature;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('livewire.layouts.leads')]
class LeadsSubscribe extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public ClientLeadForm $instance;
    public $isUploaded;






    public function mount()
    {


        // 1: checkSession
        if (! is_null(session(key: 'totalCheckoutPrice'))) {

            $this->instance->checkoutPrice = session('totalCheckoutPrice') ?? 0;



            // 1.2: plan / features
            if (session('plan')) {

                $this->instance->checkoutPlan = Plan::find(session('plan'));


            } else {

                $this->instance->checkoutFeatures = implode(',', session('features'));


            } // end if



        } else {

            $this->redirect(route('website.home'));

        } // end if







        // 2: init
        $this->isUploaded = false;

        $this->instance->phoneKey = '+971';
        $this->instance->landlineKey = '+971';
        $this->instance->contactPersonPhoneKey = '+971';
        $this->instance->contactPersonWhatsappKey = '+971';




        // 1.2: reset
        Session::forget('businessName');



    } // end function








    // --------------------------------------------------------------------------------------







    public function store()
    {



        // 1: validation
        $this->instance->validate();





        // 1.2: uploadFile
        if ($this->instance->tradeFile)
            $this->instance->tradeFileName = $this->uploadFile($this->instance->tradeFile, 'clients/trades', 'TRD');







        // -------------------------------------------------------
        // -------------------------------------------------------







        // 2: create
        $lead = new ClientLead();



        // 2.1: general
        $lead->name = $this->instance->name ?? null;
        $lead->email = $this->instance->email ?? null;

        $lead->phone = $this->instance->phone ?? null;
        $lead->phoneKey = $this->instance->phoneKey ?? null;

        $lead->landline = $this->instance->landline ?? null;
        $lead->landlineKey = $this->instance->landlineKey ?? null;

        $lead->address = $this->instance->address ?? null;
        $lead->country = $this->instance->country ?? null;

        $lead->users = $this->instance->users ?? null;




        // 2.2: contactPerson
        $lead->contactPerson = $this->instance->contactPerson ?? null;

        $lead->contactPersonPhone = $this->instance->contactPersonPhone ?? null;
        $lead->contactPersonPhoneKey = $this->instance->contactPersonPhoneKey ?? null;


        $lead->contactPersonWhatsapp = $this->instance->contactPersonWhatsapp ?? null;
        $lead->contactPersonWhatsappKey = $this->instance->contactPersonWhatsappKey ?? null;





        // 1.3: tradeFile
        $lead->tradeFile = $this->instance->tradeFileName ?? null;



        // 1.4: price
        $lead->price = $this->instance->checkoutPrice ?? 0;




        // 1.5: plan or features
        $lead->planId = $this->instance->checkoutPlan->id ?? null;


        if ($this->instance->checkoutFeatures ?? false) {

            $featuresInArray = explode(',', $this->instance->checkoutFeatures);
            $features = Feature::whereIn('name', $featuresInArray)?->pluck('nameURL')?->toArray() ?? [];

            $lead->features = implode(',', $features) ?? null;

        } // end if





        $lead->save();








        // 1.4: toSuccess - removeSessions
        Session::put('businessName', $this->instance->name);
        Session::forget(['totalCheckoutPrice', 'plan', 'features']);

        return $this->redirect(route('website.success'), navigate: false);



    } // end function









    // --------------------------------------------------------------------------------------







    public function uploaded()
    {


        // 1: changeStatus
        $this->isUploaded = true;




    } // end function







    // -------------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $countryCodes = CountryCode::all();

        return view('livewire.leads.leads-subscribe', compact('countryCodes'));


    } // end function





} // end class
