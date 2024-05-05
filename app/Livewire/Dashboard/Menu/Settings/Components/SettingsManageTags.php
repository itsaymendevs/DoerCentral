<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\TagForm;
use App\Models\Tag;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsManageTags extends Component
{
    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public TagForm $instance;







    public function store()
    {


        // :: validate
        $this->instance->validate();





        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/tags', 'TAG');






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/tags/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetFile', file: 'tag--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('refreshViews');




        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------














    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $tags = Tag::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.settings.components.settings-manage-tags', compact('tags'));

    } // end function



} // end class




