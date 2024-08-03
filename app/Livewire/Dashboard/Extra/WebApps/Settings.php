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
    public BlogSettingsForm $instance;








    public function mount()
    {





        // 1: blogs
        $settings = BlogSetting::first();


        foreach ($settings->toArray() as $key => $value)
            $this->instance->{$key} = $value;







        // 1.2: imageFiles
        $this->instance->heroImageFileName = $this->instance?->heroImageFile ?? null;
        $this->instance->heroSecondImageFileName = $this->instance?->heroSecondImageFile ?? null;
        $this->instance->heroThirdImageFileName = $this->instance?->heroThirdImageFile ?? null;
        $this->instance->heroFourthImageFileName = $this->instance?->heroFourthImageFile ?? null;

        $this->instance->footerImageFileName = $this->instance?->footerImageFile ?? null;






        // -----------------------------------------
        // -----------------------------------------






        // 1.3: previews
        if ($this->instance->heroImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instance->heroImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-1', defaultPreview: $preview);

        } // end if




        if ($this->instance->heroSecondImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instance->heroSecondImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-2', defaultPreview: $preview);

        } // end if




        if ($this->instance->heroThirdImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instance->heroThirdImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-3', defaultPreview: $preview);

        } // end if




        if ($this->instance->heroFourthImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instance->heroFourthImageFile);
            $this->dispatch('setFilePreview', filePreview: 'hero--preview-4', defaultPreview: $preview);

        } // end if





        if ($this->instance->footerImageFile) {

            $preview = asset('storage/extra/blogs/settings/' . $this->instance->footerImageFile);
            $this->dispatch('setFilePreview', filePreview: 'footer--preview-1', defaultPreview: $preview);

        } // end if







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
        if ($this->instance->heroImageFile != $this->instance->heroImageFileName)
            $this->instance->heroImageFileName = $this->replaceFile($this->instance->heroImageFile, 'extra/blogs/settings', $this->instance->heroImageFileName, 'SFI');




        if ($this->instance->heroSecondImageFile != $this->instance->heroSecondImageFileName)
            $this->instance->heroSecondImageFileName = $this->replaceFile($this->instance->heroSecondImageFile, 'extra/blogs/settings', $this->instance->heroSecondImageFileName, 'SSE');




        if ($this->instance->heroThirdImageFile != $this->instance->heroThirdImageFileName)
            $this->instance->heroThirdImageFileName = $this->replaceFile($this->instance->heroThirdImageFile, 'extra/blogs/settings', $this->instance->heroThirdImageFileName, 'STH');



        if ($this->instance->heroFourthImageFile != $this->instance->heroFourthImageFileName)
            $this->instance->heroFourthImageFileName = $this->replaceFile($this->instance->heroFourthImageFile, 'extra/blogs/settings', $this->instance->heroFourthImageFileName, 'SFO');







        // 1.2: heroFile
        if ($this->instance->footerImageFile != $this->instance->footerImageFileName)
            $this->instance->footerImageFileName = $this->replaceFile($this->instance->footerImageFile, 'extra/blogs/settings', $this->instance->footerImageFileName, 'SFT');








        // ------------------------------------------------
        // ------------------------------------------------








        // 2: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/blogs/attachments/update', $this->instance);




        // 2.1: alert
        $this->makeAlert('success', $response?->message);





    } // end function












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
