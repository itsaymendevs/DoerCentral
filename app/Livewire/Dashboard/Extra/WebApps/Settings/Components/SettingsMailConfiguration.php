<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use App\Livewire\Forms\MailConfigurationForm;
use App\Models\MailConfiguration;
use App\Traits\HelperTrait;
use Livewire\Component;

class SettingsMailConfiguration extends Component
{


    use HelperTrait;



    // :: variable
    public MailConfigurationForm $instance;






    public function mount()
    {


        // 1: get instance
        $configuration = MailConfiguration::first();


        foreach ($configuration->toArray() as $key => $value)
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
        $response = $this->makeRequest('dashboard/extra/settings/mail-configurations/update', $this->instance);


        $this->makeAlert('success', $response?->message);




    } // end function








    // -----------------------------------------------------------








    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.settings.components.settings-mail-configuration');


    } // end function






} // end class
