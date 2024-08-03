<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use App\Livewire\Forms\SocialForm;
use App\Models\Social;
use App\Traits\HelperTrait;
use Livewire\Component;

class SettingsSocials extends Component
{

    use HelperTrait;



    // :: variables
    public SocialForm $instance;





    public function mount()
    {


        // 1: get instance
        $social = Social::first();


        foreach ($social->toArray() as $key => $value)
            $this->instance->{$key} = $value;


    } // end class










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
        $response = $this->makeRequest('dashboard/extra/settings/socials/update', $this->instance);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);



    } // end function










    // -----------------------------------------------------------










    public function render()
    {

        return view('livewire.dashboard.extra.web-apps.settings.components.settings-socials');

    } // end function







} // end class
