<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use App\Livewire\Forms\ProfileForm;
use App\Models\Profile;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsGeneral extends Component
{


    use HelperTrait;
    use WithFileUploads;


    // :: variables
    public ProfileForm $instance;







    public function mount()
    {



        // 1.5: profile
        $profile = Profile::first();


        foreach ($profile->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.6: imageFiles
        $this->instance->imageFileName = $this->instance?->imageFile ?? null;
        $this->instance->imageFileDarkName = $this->instance?->imageFileDark ?? null;






        // 1.7: previews
        if ($this->instance->imageFile) {

            $preview = asset('storage/profile/' . $this->instance->imageFile);
            $this->dispatch('setFilePreview', filePreview: 'profile--preview-1', defaultPreview: $preview);

        } // end if



        if ($this->instance->imageFileDark) {

            $preview = asset('storage/profile/' . $this->instance->imageFileDark);
            $this->dispatch('setFilePreview', filePreview: 'profile--preview-2', defaultPreview: $preview);

        } // end if







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






        // 1: replaceFiles
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'profile', $this->instance->imageFileName, 'LG', 300, 300, true);




        if ($this->instance->imageFileDark != $this->instance->imageFileDarkName)
            $this->instance->imageFileDarkName = $this->replaceFile($this->instance->imageFileDark, 'profile', $this->instance->imageFileDarkName, 'LGD', 300, 300, true);









        // ------------------------------------------------
        // ------------------------------------------------








        // 2: makeRequest
        $response = $this->makeRequest('dashboard/extra/settings/profile/update', $this->instance);





        // 2.1: alert
        $this->makeAlert('success', $response?->message);





    } // end function










    // -----------------------------------------------------------











    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.settings.components.settings-general');


    } // end function






} // end class
