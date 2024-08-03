<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Blogs\BlogsView\Components;

use App\Livewire\Forms\BlogSectionForm;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsViewCreateSection extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BlogSectionForm $instance;





    public function mount($id)
    {


        // 1: get instance
        $this->instance->blogId = $id;
        $this->instance->type = 'Regular';


    } // end function









    // --------------------------------------------------------------------











    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: validate
        $this->instance->validate();






        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'extra/blogs/sections', 'SEC1', 700, 700);


        if ($this->instance->secondImageFile)
            $this->instance->secondImageFileName = $this->uploadFile($this->instance->secondImageFile, 'extra/blogs/sections', 'SEC2', 700, 700);



        if ($this->instance->thirdImageFile)
            $this->instance->thirdImageFileName = $this->uploadFile($this->instance->thirdImageFile, 'extra/blogs/sections', 'SEC3', 700, 700);


        if ($this->instance->fourthImageFile)
            $this->instance->fourthImageFileName = $this->uploadFile($this->instance->fourthImageFile, 'extra/blogs/sections', 'SEC4', 700, 700);





        // --------------------------------------
        // --------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/website/blogs/sections/store', $this->instance);






        // 2: reset
        $this->dispatch('resetEditorContent');
        $this->instance->reset('title', 'content', 'imageFile', 'secondImageFile', 'thirdImageFile', 'fourthImageFile', 'imageFileName', 'secondImageFileName', 'thirdImageFileName', 'fourthImageFileName');


        $this->dispatch('resetFile', file: 'section--file-1',
            defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'section--file-2',
            defaultPreview: $this->getDefaultPreview());

        $this->dispatch('resetFile', file: 'section--file-3',
            defaultPreview: $this->getDefaultPreview());

        $this->dispatch('resetFile', file: 'section--file-4',
            defaultPreview: $this->getDefaultPreview());








        // 2.1: refresh
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-section .btn--close');

        $this->makeAlert('success', $response->message);






    } // end function






    // --------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $types = ['Floating Left', 'Regular', 'Floating Right'];




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.blogs.blogs-view.components.blogs-view-create-section', compact('types'));

    } // end function



} // end class
