<?php

namespace App\Livewire\Dashboard\Extra\WebApps;

use App\Livewire\Forms\SocialForm;
use App\Models\Social;
use App\Traits\HelperTrait;
use Livewire\Component;

class Socials extends Component
{


    use HelperTrait;


    // :: variable
    public SocialForm $instance;








    public function mount()
    {


        // 1: clone instance
        $social = Social::first();


        foreach ($social->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function








    // -----------------------------------------------------------










    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/socials/update', $this->instance);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);



    } // end function









    // -----------------------------------------------------------








    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.extra.web-apps.socials');



    } // end function








} // end class
