<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Blogs\BlogsView\Components;

use App\Livewire\Forms\BlogSectionForm;
use App\Models\BlogSection;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsViewEditSection extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BlogSectionForm $instance;
    public $section;








    #[On('editSection')]
    public function remount($id)
    {




        // 1.1: get instance
        $this->section = BlogSection::find($id);


        foreach ($this->section->toArray() as $key => $value)
            $this->instance->{$key} = $value;







        // 1.2: setEditor
        $this->dispatch("setEditorContent-quill-editor-2", value: $this->instance?->content ?? '');






        // 1.3: imageFiles
        $this->instance->imageFileName = $this->instance?->imageFile ?? null;
        $this->instance->secondImageFileName = $this->instance?->secondImageFile ?? null;
        $this->instance->thirdImageFileName = $this->instance?->thirdImageFile ?? null;
        $this->instance->fourthImageFileName = $this->instance?->fourthImageFile ?? null;









        // -----------------------------------------
        // -----------------------------------------







        // 1.4: previews
        if ($this->instance->imageFileName) {

            $preview = url('storage/extra/blogs/sections/' . $this->instance->imageFileName);
            $this->dispatch('setFilePreview', filePreview: 'section--preview-5', defaultPreview: $preview);

        } else {

            $this->dispatch('resetFile', file: 'section--file-5', defaultPreview: $this->getDefaultPreview());


        } // end if




        if ($this->instance->secondImageFile) {

            $preview = url('storage/extra/blogs/sections/' . $this->instance->secondImageFile);
            $this->dispatch('setFilePreview', filePreview: 'section--preview-6', defaultPreview: $preview);

        } else {

            $this->dispatch('resetFile', file: 'section--file-6', defaultPreview: $this->getDefaultPreview());


        } // end if




        if ($this->instance->thirdImageFile) {

            $preview = url('storage/extra/blogs/sections/' . $this->instance->thirdImageFile);
            $this->dispatch('setFilePreview', filePreview: 'section--preview-7', defaultPreview: $preview);

        } else {

            $this->dispatch('resetFile', file: 'section--file-7', defaultPreview: $this->getDefaultPreview());


        } // end if




        if ($this->instance->fourthImageFile) {

            $preview = url('storage/extra/blogs/sections/' . $this->instance->fourthImageFile);
            $this->dispatch('setFilePreview', filePreview: 'section--preview-8', defaultPreview: $preview);

        } else {

            $this->dispatch('resetFile', file: 'section--file-8', defaultPreview: $this->getDefaultPreview());


        } // end if







    } // end function











    // --------------------------------------------------------------------











    public function update()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // :: validate
        $this->instance->validate();




        // 1: replaceFiles
        if ($this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'extra/blogs/sections', $this->instance->imageFileName, 'SEC1', 700, 700);

        } // end if




        if ($this->instance->secondImageFile != $this->instance->secondImageFileName) {

            $this->instance->secondImageFileName = $this->replaceFile($this->instance->secondImageFile, 'extra/blogs/sections', $this->instance->secondImageFileName, 'SEC2', 700, 700);

        } // end if






        if ($this->instance->thirdImageFile != $this->instance->thirdImageFileName) {

            $this->instance->thirdImageFileName = $this->replaceFile($this->instance->thirdImageFile, 'extra/blogs/sections', $this->instance->thirdImageFileName, 'SEC3', 700, 700);

        } // end if





        if ($this->instance->fourthImageFile != $this->instance->fourthImageFileName) {

            $this->instance->fourthImageFileName = $this->replaceFile($this->instance->fourthImageFile, 'extra/blogs/sections', $this->instance->fourthImageFileName, 'SEC4', 700, 700);

        } // end if










        // --------------------------------------
        // --------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/website/blogs/sections/update', $this->instance);






        // 2: reset
        $this->instance->reset();
        $this->dispatch('resetEditorContent');

        $this->dispatch('resetFile', file: 'section--file-5', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'section--file-6', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'section--file-7', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'section--file-8', defaultPreview: $this->getDefaultPreview());





        // 2.1: refresh
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-section .btn--close');

        $this->makeAlert('success', $response->message);






    } // end function






    // --------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $types = ['Floating Left', 'Regular', 'Floating Right'];







        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.blogs.blogs-view.components.blogs-view-edit-section', compact('types'));

    } // end function



} // end class
