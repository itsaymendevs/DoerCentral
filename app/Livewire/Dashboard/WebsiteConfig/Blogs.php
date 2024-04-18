<?php

namespace App\Livewire\Dashboard\WebsiteConfig;

use App\Models\Blog;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Blogs extends Component
{




    use HelperTrait;


    // :: filter - remove
    public $searchBlog = '';
    public $removeId;








    public function toggleForWebsite($id)
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/website-config/blogs/toggle', $id);


        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function










    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmBlogRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBlogRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/website-config/blogs/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if




        // 1.2: refreshViews
        $this->dispatch('refreshViews');



    } // end function








    // --------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $blogs = Blog::where('title', 'LIKE', '%' . $this->searchBlog . '%')->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.website-config.blogs', compact('blogs'));


    } // end function




} // end class
