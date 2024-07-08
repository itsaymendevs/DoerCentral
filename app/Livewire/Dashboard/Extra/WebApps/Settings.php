<?php

namespace App\Livewire\Dashboard\Extra\WebApps;

use App\Livewire\Forms\BlogSettingsForm;
use App\Livewire\Forms\SocialForm;
use App\Models\BlogSetting;
use App\Models\Social;
use App\Traits\HelperTrait;
use Livewire\Component;

class Settings extends Component
{


    use HelperTrait;


    // :: variable
    public SocialForm $instance;
    public BlogSettingsForm $instanceBlog;








    public function mount()
    {


        // 1: get instance
        $social = Social::first();


        foreach ($social->toArray() as $key => $value)
            $this->instance->{$key} = $value;







        // 2: settings
        $settings = BlogSetting::first();


        foreach ($settings->toArray() as $key => $value)
            $this->instanceBlog->{$key} = $value;



        $this->instanceBlog->bodyColor = '#ffffff';






    } // end function








    // -----------------------------------------------------------










    public function updateSocials()
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










    public function updateBlogSettings()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if







        // --------------------------------------
        // --------------------------------------






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/blogs/update', $this->instance);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);





    } // end function









    // -----------------------------------------------------------








    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.extra.web-apps.settings');



    } // end function








} // end class
