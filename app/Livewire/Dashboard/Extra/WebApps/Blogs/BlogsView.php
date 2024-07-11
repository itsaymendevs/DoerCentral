<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Blogs;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog;
use App\Models\BlogSection;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsView extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BlogForm $instance;
    public $blog;









    public function mount($id)
    {



        // 1: clone instance / Files
        $this->blog = Blog::find($id);


        foreach ($this->blog->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        // 1.2: convertBoolean - images
        $this->instance->showTags = boolval($this->instance->showTags);
        $this->instance->showReferences = boolval($this->instance->showReferences);
        $this->instance->isHeaderFluid = boolval($this->instance->isHeaderFluid);
        $this->instance->isSquareCard = boolval($this->instance->isSquareCard);


        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->headerImageFileName = $this->instance->headerImageFile;








        // -----------------------------------------
        // -----------------------------------------







        // 1.3: setFilePreview
        $this->dispatch('setFilePreview', filePreview: 'blog--preview-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('setFilePreview', filePreview: 'blog--preview-2', defaultPreview: $this->getDefaultPreview());




        $preview = asset('storage/extra/blogs/' . $this->instance->headerImageFile);
        $this->dispatch('setFilePreview', filePreview: 'blog--preview-1', defaultPreview: $preview);


        $preview = asset('storage/extra/blogs/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'blog--preview-2', defaultPreview: $preview);




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






        // :: validate
        $this->instance->validate();




        // 1: replaceFiles
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'extra/blogs', $this->instance->imageFileName, 'BLG');




        if ($this->instance->headerImageFile != $this->instance->headerImageFileName)
            $this->instance->headerImageFileName = $this->replaceFile($this->instance->headerImageFile, 'extra/blogs', $this->instance->headerImageFileName, 'BLG-HEADER');








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/website/blogs/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response->message);






    } // end function












    // --------------------------------------------------------------------







    public function editSection($id)
    {


        // 1: dispatchId
        $this->dispatch('editSection', $id);


    } // end function











    // -----------------------------------------------------------------






    public function remove($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmSectionRemove');



    } // end function









    // -----------------------------------------------------------------------------





    #[On('confirmSectionRemove')]
    public function confirmRemove()
    {





        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/extra/website/blogs/sections/remove', $this->removeId);
            $this->makeAlert('info', $response->message);


        } // end if




        $this->render();


    } // end function








    // --------------------------------------------------------------------











    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $sections = BlogSection::where('blogId', $this->blog->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.extra.web-apps.blogs.blogs-view', compact('sections'));



    } // end function



} // end class
