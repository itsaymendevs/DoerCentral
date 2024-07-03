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







    #[On('editPlan')]
    public function remount($id)
    {



        // 1: clone instance
        $plan = Plan::find($id);

        foreach ($plan->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->secondImageFileName = $this->instance->secondImageFile ?? null;
        $this->instance->thirdImageFileName = $this->instance->thirdImageFile ?? null;






        // 1.2: setFilePreview
        $preview = asset('storage/menu/plans/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-4', defaultPreview: $preview);


        $preview = asset('storage/menu/plans/' . $this->instance->secondImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-5', defaultPreview: $preview);


        $preview = asset('storage/menu/plans/' . $this->instance->thirdImageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-6', defaultPreview: $preview);






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









        // ## log - activity ##
        $this->storeActivity('Menu', "Updated plan {$this->instance->name}");



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/update', $this->instance);







        // :: refresh / closeModal
        $this->instance->reset();

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-plan .btn--close');
        $this->dispatch('resetFile', file: 'plan--file-4', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-5', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('resetFile', file: 'plan--file-6', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.components.plans-edit');

    } // end function


} // end class
