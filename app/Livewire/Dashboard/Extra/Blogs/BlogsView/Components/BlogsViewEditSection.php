<?php

namespace App\Livewire\Dashboard\Extra\Blogs\BlogsView\Components;

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


        // 1: clone instance
        $this->section = BlogSection::find($id);


        foreach ($this->section->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        $this->instance->sideImageFileName = $this->instance?->sideImageFile ?? null;
        $this->instance->bottomImageFileName = $this->instance?->bottomImageFile ?? null;






        // -----------------------------------------
        // -----------------------------------------






        // 1.2: setFilePreview

        if ($this->instance->sideImageFile) {

            $preview = asset('storage/extra/blogs/sections/' . $this->instance->sideImageFile);
            $this->dispatch('setFilePreview', filePreview: 'blog--preview-5', defaultPreview: $preview);

        } // end if



        if ($this->instance->bottomImageFile) {

            $preview = asset('storage/extra/blogs/sections/' . $this->instance->bottomImageFile);
            $this->dispatch('setFilePreview', filePreview: 'blog--preview-6', defaultPreview: $preview);

        } // end if






    } // end function









    // --------------------------------------------------------------------











    public function update()
    {




        // :: validate
        $this->instance->validate();




        // 1: replaceFiles
        if ($this->instance->sideImageFile != $this->instance->sideImageFileName)
            $this->instance->sideImageFileName = $this->uploadFile($this->instance->sideImageFile, 'extra/blogs/sections');


        if ($this->instance->bottomImageFile != $this->instance->bottomImageFileName)
            $this->instance->bottomImageFileName = $this->uploadFile($this->instance->bottomImageFile, 'extra/blogs/sections');









        // --------------------------------------
        // --------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/blogs/sections/update', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetFile', file: 'blog--file-5', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'blog--file-6', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('closeModal', modal: '#edit-section .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);






    } // end function






    // --------------------------------------------------------------------








    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.blogs.blogs-view.components.blogs-view-edit-section');

    } // end function



} // end class
