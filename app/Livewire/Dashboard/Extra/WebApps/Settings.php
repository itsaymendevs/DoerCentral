<?php

namespace App\Livewire\Dashboard\Extra\WebApps;

use App\Livewire\Forms\BlogSettingsForm;
use App\Livewire\Forms\ProfileForm;
use App\Livewire\Forms\SocialForm;
use App\Livewire\Forms\SubscriptionSettingsForm;
use App\Models\BlogSetting;
use App\Models\Profile;
use App\Models\Social;
use App\Models\SubscriptionSetting;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variable
    public SocialForm $instance;
    public BlogSettingsForm $instanceBlog;
    public ProfileForm $instanceProfile;
    public SubscriptionSettingsForm $instanceSubscription;








    public function mount()
    {


        // 1: get instance
        $social = Social::first();


        foreach ($social->toArray() as $key => $value)
            $this->instance->{$key} = $value;











        // --------------------------------------------
        // --------------------------------------------
        // --------------------------------------------






        // 1.5: profile
        $profile = Profile::first();


        foreach ($profile->toArray() as $key => $value)
            $this->instanceProfile->{$key} = $value;




        // 1.6: imageFiles
        $this->instanceProfile->imageFileName = $this->instanceProfile?->imageFile ?? null;
        $this->instanceProfile->imageFileDarkName = $this->instanceProfile?->imageFileDark ?? null;






        // 1.7: previews
        if ($this->instanceProfile->imageFile) {

            $preview = asset('storage/profile/' . $this->instanceProfile->imageFile);
            $this->dispatch('setFilePreview', filePreview: 'profile--preview-1', defaultPreview: $preview);

        } // end if



        if ($this->instanceProfile->imageFileDark) {

            $preview = asset('storage/profile/' . $this->instanceProfile->imageFileDark);
            $this->dispatch('setFilePreview', filePreview: 'profile--preview-2', defaultPreview: $preview);

        } // end if










        // --------------------------------------------
        // --------------------------------------------
        // --------------------------------------------








        // 2: blogs
        $settings = BlogSetting::first();


        foreach ($settings->toArray() as $key => $value)
            $this->instanceBlog->{$key} = $value;







        // 2.2: imageFiles
        $this->instanceBlog->heroImageFileName = $this->instanceBlog?->heroImageFile ?? null;
        $this->instanceBlog->heroSecondImageFileName = $this->instanceBlog?->heroSecondImageFile ?? null;
        $this->instanceBlog->heroThirdImageFileName = $this->instanceBlog?->heroThirdImageFile ?? null;
        $this->instanceBlog->heroFourthImageFileName = $this->instanceBlog?->heroFourthImageFile ?? null;

        $this->instanceBlog->footerImageFileName = $this->instanceBlog?->footerImageFile ?? null;






        // -----------------------------------------
        // -----------------------------------------






        // 2.3: previews
        if ($this->instanceBlog->heroImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instanceBlog->heroImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-1', defaultPreview: $preview);

        } // end if




        if ($this->instanceBlog->heroSecondImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instanceBlog->heroSecondImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-2', defaultPreview: $preview);

        } // end if




        if ($this->instanceBlog->heroThirdImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instanceBlog->heroThirdImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-3', defaultPreview: $preview);

        } // end if




        if ($this->instanceBlog->heroFourthImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instanceBlog->heroFourthImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-4', defaultPreview: $preview);

        } // end if





        if ($this->instanceBlog->footerImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instanceBlog->footerImageFile);
            $this->dispatch('setFilePreview', filePreview: 'footer--preview-1', defaultPreview: $preview);

        } // end if














        // --------------------------------------------
        // --------------------------------------------
        // --------------------------------------------








        // 3: subscription
        $settings = SubscriptionSetting::first();


        foreach ($settings->toArray() as $key => $value)
            $this->instanceSubscription->{$key} = $value;



        $this->instanceSubscription->planCustomSectionImageFileName = $this->instanceSubscription->planCustomSectionImageFile;

        $this->instanceSubscription->planCustomSectionSecondImageFileName = $this->instanceSubscription->planCustomSectionSecondImageFile ?? null;

        $this->instanceSubscription->planCustomSectionThirdImageFileName = $this->instanceSubscription->planCustomSectionThirdImageFile ?? null;

        $this->instanceSubscription->planCustomSectionFourthImageFileName = $this->instanceSubscription->planCustomSectionFourthImageFile ?? null;

        $this->instanceSubscription->planCustomSectionFifthImageFileName = $this->instanceSubscription->planCustomSectionFifthImageFile ?? null;

        $this->instanceSubscription->planCustomSectionSixthImageFileName = $this->instanceSubscription->planCustomSectionSixthImageFile ?? null;






        // 1.2: setFilePreview
        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-1', defaultPreview: $this->instanceSubscription->planCustomSectionImageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionSecondImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-2', defaultPreview: $this->instanceSubscription->planCustomSectionSecondImageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionThirdImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-3', defaultPreview: $this->instanceSubscription->planCustomSectionThirdImageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionFourthImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-4', defaultPreview: $this->instanceSubscription->planCustomSectionFourthImageFile ? $preview : $this->getDefaultPreview());



        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionFifthImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-5', defaultPreview: $this->instanceSubscription->planCustomSectionFifthImageFile ? $preview : $this->getDefaultPreview());



        $preview = asset('storage/extra/subscription/custom/' . $this->instanceSubscription->planCustomSectionSixthImageFile);
        $this->dispatch('setFilePreview', filePreview: 'custom--preview-6', defaultPreview: $this->instanceSubscription->planCustomSectionSixthImageFile ? $preview : $this->getDefaultPreview());




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
        $response = $this->makeRequest('dashboard/extra/settings/blogs/update', $this->instanceBlog);




        // 1.2: alert
        $this->makeAlert('success', $response?->message);





    } // end function














    // -----------------------------------------------------------










    public function updateBlogAttachments()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if








        // --------------------------------------
        // --------------------------------------








        // 1: replaceFiles
        if ($this->instanceBlog->heroImageFile != $this->instanceBlog->heroImageFileName)
            $this->instanceBlog->heroImageFileName = $this->replaceFile($this->instanceBlog->heroImageFile, 'extra/blogs/settings', $this->instanceBlog->heroImageFileName, 'SFI');




        if ($this->instanceBlog->heroSecondImageFile != $this->instanceBlog->heroSecondImageFileName)
            $this->instanceBlog->heroSecondImageFileName = $this->replaceFile($this->instanceBlog->heroSecondImageFile, 'extra/blogs/settings', $this->instanceBlog->heroSecondImageFileName, 'SSE');




        if ($this->instanceBlog->heroThirdImageFile != $this->instanceBlog->heroThirdImageFileName)
            $this->instanceBlog->heroThirdImageFileName = $this->replaceFile($this->instanceBlog->heroThirdImageFile, 'extra/blogs/settings', $this->instanceBlog->heroThirdImageFileName, 'STH');



        if ($this->instanceBlog->heroFourthImageFile != $this->instanceBlog->heroFourthImageFileName)
            $this->instanceBlog->heroFourthImageFileName = $this->replaceFile($this->instanceBlog->heroFourthImageFile, 'extra/blogs/settings', $this->instanceBlog->heroFourthImageFileName, 'SFO');







        // 1.2: heroFile
        if ($this->instanceBlog->footerImageFile != $this->instanceBlog->footerImageFileName)
            $this->instanceBlog->footerImageFileName = $this->replaceFile($this->instanceBlog->footerImageFile, 'extra/blogs/settings', $this->instanceBlog->footerImageFileName, 'SFT');








        // ------------------------------------------------
        // ------------------------------------------------








        // 2: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/blogs/attachments/update', $this->instanceBlog);




        // 2.1: alert
        $this->makeAlert('success', $response?->message);





    } // end function












    // -----------------------------------------------------------










    public function updateSubscriptionSettings()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if









        // --------------------------------------
        // --------------------------------------








        // 1: replaceFiles
        if ($this->instanceSubscription->planCustomSectionImageFile != $this->instanceSubscription->planCustomSectionImageFileName)
            $this->instanceSubscription->planCustomSectionImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionImageFileName, 'SFI');




        if ($this->instanceSubscription->planCustomSectionSecondImageFile != $this->instanceSubscription->planCustomSectionSecondImageFileName)
            $this->instanceSubscription->planCustomSectionSecondImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionSecondImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionSecondImageFileName, 'SSE');




        if ($this->instanceSubscription->planCustomSectionThirdImageFile != $this->instanceSubscription->planCustomSectionThirdImageFileName)
            $this->instanceSubscription->planCustomSectionThirdImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionThirdImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionThirdImageFileName, 'STH');



        if ($this->instanceSubscription->planCustomSectionFourthImageFile != $this->instanceSubscription->planCustomSectionFourthImageFileName)
            $this->instanceSubscription->planCustomSectionFourthImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionFourthImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionFourthImageFileName, 'SFO');





        if ($this->instanceSubscription->planCustomSectionFifthImageFile != $this->instanceSubscription->planCustomSectionFifthImageFileName)
            $this->instanceSubscription->planCustomSectionFifthImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionFifthImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionFifthImageFileName, 'SFO');






        if ($this->instanceSubscription->planCustomSectionSixthImageFile != $this->instanceSubscription->planCustomSectionSixthImageFileName)
            $this->instanceSubscription->planCustomSectionSixthImageFileName = $this->replaceFile($this->instanceSubscription->planCustomSectionSixthImageFile, 'extra/subscription/custom', $this->instanceSubscription->planCustomSectionSixthImageFileName, 'SFO');








        // ------------------------------------------------
        // ------------------------------------------------







        // 2: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/subscription/update', $this->instanceSubscription);




        // 2.1: alert
        $this->makeAlert('success', $response?->message);





    } // end function















    // -----------------------------------------------------------










    public function updateProfile()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if








        // --------------------------------------
        // --------------------------------------






        // 1: replaceFiles
        if ($this->instanceProfile->imageFile != $this->instanceProfile->imageFileName)
            $this->instanceProfile->imageFileName = $this->replaceFile($this->instanceProfile->imageFile, 'profile', $this->instanceProfile->imageFileName, 'LG');




        if ($this->instanceProfile->imageFileDark != $this->instanceProfile->imageFileDarkName)
            $this->instanceProfile->imageFileDarkName = $this->replaceFile($this->instanceProfile->imageFileDark, 'profile', $this->instanceProfile->imageFileDarkName, 'LGD');








        // ------------------------------------------------
        // ------------------------------------------------








        // 2: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/profile/update', $this->instanceProfile);




        // 2.1: alert
        $this->makeAlert('success', $response?->message);





    } // end function










    // -----------------------------------------------------------






    public function updatePlansTemplate($name)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if








        // --------------------------------------
        // --------------------------------------







        // 2: makeRequest
        $this->instanceSubscription->template = $name;

        $response = $this->makeRequest('dashboard/extra/settings/subscription/update', $this->instanceSubscription);




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



        return view('livewire.dashboard.extra.web-apps.settings', compact('alignments'));



    } // end function








} // end class
