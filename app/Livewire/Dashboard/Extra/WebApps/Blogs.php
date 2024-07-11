<?php

namespace App\Livewire\Dashboard\Extra\WebApps;

use App\Models\Blog;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Blogs extends Component
{



    use HelperTrait;


    // :: filter - remove
    public $searchBlog = '';








    public function toggleForWebsite($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/extra/website/blogs/toggle', $id);


        // :: makeAlert
        $this->makeAlert('success', $response->message);



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

        $this->makeAlert('remove', null, 'confirmBlogRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBlogRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/extra/website/blogs/remove', $this->removeId);
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


        return view('livewire.dashboard.extra.web-apps.blogs', compact('blogs'));


    } // end function




} // end class
