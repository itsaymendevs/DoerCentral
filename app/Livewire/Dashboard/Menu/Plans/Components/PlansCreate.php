<?php

namespace App\Livewire\Dashboard\Menu\Plans\Components;

use App\Livewire\Forms\PlanForm;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class PlansCreate extends Component
{

    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;



    // :: variables
    public PlanForm $instance;
    public $sectionPoint;




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
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/plans', 'PLN', 600, 600);


        if ($this->instance->secondImageFile)
            $this->instance->secondImageFileName = $this->uploadFile($this->instance->secondImageFile, 'menu/plans', 'PLN-S', 600, 600);


        if ($this->instance->thirdImageFile)
            $this->instance->thirdImageFileName = $this->uploadFile($this->instance->thirdImageFile, 'menu/plans', 'PLN-T', 900, 1170);




        if ($this->instance->fourthImageFile)
            $this->instance->fourthImageFileName = $this->uploadFile($this->instance->fourthImageFile, 'menu/plans', 'PLN-T', 900, 900);




        if ($this->instance->fifthImageFile)
            $this->instance->fifthImageFileName = $this->uploadFile($this->instance->fifthImageFile, 'menu/plans', 'PLN-T', 1920, 1080);




        if ($this->instance->sixthImageFile)
            $this->instance->sixthImageFileName = $this->uploadFile($this->instance->sixthImageFile, 'menu/plans', 'PLN-T', 1080, 1080);






        // ## log - activity ##
        $this->storeActivity('Menu', "Created plan {$this->instance->name}");




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->sectionPoint = null;

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-plan .btn--close');
        $this->dispatch('resetFile', file: 'plan--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-3', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-4', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-5', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-6', defaultPreview: $this->getDefaultPreview());




        $this->makeAlert('success', $response->message);




    } // end function






    // ------------------------------------------------------------------






    public function append()
    {



        // 1: checkPoint
        if ($this->sectionPoint) {


            array_push($this->instance->points, $this->sectionPoint);
            $this->sectionPoint = null;


        } // end if




    } // end function










    // ------------------------------------------------------------------






    public function remove($key)
    {



        // 1: checkPoints
        if ($this->instance->points[$key]) {

            unset($this->instance->points[$key]);

        } // end if




    } // end function









    // ------------------------------------------------------------------







    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.components.plans-create');

    } // end function


} // end class

