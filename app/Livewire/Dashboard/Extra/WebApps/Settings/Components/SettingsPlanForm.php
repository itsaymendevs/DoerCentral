<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use App\Livewire\Forms\SubscriptionFormSettingsForm;
use App\Models\SubscriptionFormSetting;
use App\Traits\HelperTrait;
use Livewire\Component;

class SettingsPlanForm extends Component
{



    use HelperTrait;


    // :: variables
    public SubscriptionFormSettingsForm $instance;







    public function mount()
    {


        // 1: get instance
        $settings = SubscriptionFormSetting::first();


        foreach ($settings->toArray() as $key => $value)
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
        $response = $this->makeRequest('dashboard/extra/settings/subscription/form/update', $this->instance);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);





    } // end function












    // -----------------------------------------------------------










    public function updateTemplate($name)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if








        // --------------------------------------
        // --------------------------------------







        // 2: makeRequest
        $this->instance->template = $name;

        $response = $this->makeRequest('dashboard/extra/settings/subscription/update', $this->instance);




        // 2.1: alert
        $this->makeAlert('success', $response?->message);






    } // end if








    // -----------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $alignments = ['left', 'center', 'right'];





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.settings.components.settings-plan-form', compact('alignments'));



    } // end function





} // end class
