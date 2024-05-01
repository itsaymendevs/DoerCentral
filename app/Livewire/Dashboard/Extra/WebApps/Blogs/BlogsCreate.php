<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Blogs;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogsCreate extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BlogForm $instance;








    public function store()
    {




        // :: validate
        $this->instance->validate();




        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'extra/blogs');


        if ($this->instance->headerImageFile)
            $this->instance->headerImageFileName = $this->uploadFile($this->instance->headerImageFile, 'extra/blogs');







        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/extra/blogs/store', $this->instance);






        // 1.2: alert - refresh to latestBlog
        $this->makeAlert('success', $response->message);

        $latestBlog = Blog::latest()->first();
        return $this->redirect(route('dashboard.viewBlog', ['id' => $latestBlog->id]), navigate: true);






    } // end function






    // --------------------------------------------------------------------








    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.extra.web-apps.blogs.blogs-create');

    } // end function



} // end class
