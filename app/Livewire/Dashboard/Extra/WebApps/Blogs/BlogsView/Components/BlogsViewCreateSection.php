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


        // 1: get blogId
        $this->instance->blogId = $id;



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
        if ($this->instance->sideImageFile)
            $this->instance->sideImageFileName = $this->uploadFile($this->instance->sideImageFile, 'extra/blogs/sections', 'BLG-SIDE');


        if ($this->instance->bottomImageFile)
            $this->instance->bottomImageFileName = $this->uploadFile($this->instance->bottomImageFile, 'extra/blogs/sections', 'BLG-BOTTOM');






        // --------------------------------------
        // --------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/blogs/sections/store', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetFile', file: 'blog--file-3', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'blog--file-4', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('closeModal', modal: '#new-section .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);






    } // end function






    // --------------------------------------------------------------------








    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.blogs.blogs-view.components.blogs-view-create-section');

    } // end function



} // end class
