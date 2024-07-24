<?php

namespace App\Livewire\Dashboard\Menu\Plans\Components;

use App\Livewire\Forms\PlanForm;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class PlansEdit extends Component
{

    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;


    // :: variables
    public PlanForm $instance;
    public $sectionPoint;






    #[On('editPlan')]
    public function remount($id)
    {



        // 1: clone instance
        $plan = Plan::find($id);

        foreach ($plan->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.2: points
        $this->instance->points = $plan->points?->pluck('content')->toArray() ?? [];






        // 1.3: imageFiles
        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->secondImageFileName = $this->instance->secondImageFile ?? null;
        $this->instance->thirdImageFileName = $this->instance->thirdImageFile ?? null;
        $this->instance->fourthImageFileName = $this->instance->fourthImageFile ?? null;
        $this->instance->fifthImageFileName = $this->instance->fifthImageFile ?? null;






        // 1.4: setFilePreview
        $preview = asset('storage/menu/plans/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-7', defaultPreview: $this->instance->imageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/menu/plans/' . $this->instance->secondImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-8', defaultPreview: $this->instance->secondImageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/menu/plans/' . $this->instance->thirdImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-9', defaultPreview: $this->instance->thirdImageFile ? $preview : $this->getDefaultPreview());


        $preview = asset('storage/menu/plans/' . $this->instance->fourthImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-10', defaultPreview: $this->instance->fourthImageFile ? $preview : $this->getDefaultPreview());



        $preview = asset('storage/menu/plans/' . $this->instance->fifthImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-11', defaultPreview: $this->instance->fifthImageFile ? $preview : $this->getDefaultPreview());







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






        // 1: uploadFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'menu/plans', $this->instance->imageFileName, 'PLN');



        if ($this->instance->secondImageFile != $this->instance->secondImageFileName)
            $this->instance->secondImageFileName = $this->replaceFile($this->instance->secondImageFile, 'menu/plans', $this->instance->secondImageFileName, 'PLN-S');



        if ($this->instance->thirdImageFile != $this->instance->thirdImageFileName)
            $this->instance->thirdImageFileName = $this->replaceFile($this->instance->thirdImageFile, 'menu/plans', $this->instance->thirdImageFileName, 'PLN-T');




        if ($this->instance->fourthImageFile != $this->instance->fourthImageFileName)
            $this->instance->fourthImageFileName = $this->replaceFile($this->instance->fourthImageFile, 'menu/plans', $this->instance->fourthImageFileName, 'PLN-T');






        if ($this->instance->fifthImageFile != $this->instance->fifthImageFileName)
            $this->instance->fifthImageFileName = $this->replaceFile($this->instance->fifthImageFile, 'menu/plans', $this->instance->fifthImageFileName, 'PLN-T');









        // ## log - activity ##
        $this->storeActivity('Menu', "Updated plan {$this->instance->name}");



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/update', $this->instance);







        // :: refresh / closeModal
        $this->instance->reset();
        $this->sectionPoint = null;

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-plan .btn--close');
        $this->dispatch('resetFile', file: 'plan--file-7', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-8', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-9', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-10', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-11', defaultPreview: $this->getDefaultPreview());




        // :: alert
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








    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.components.plans-edit');

    } // end function


} // end class
