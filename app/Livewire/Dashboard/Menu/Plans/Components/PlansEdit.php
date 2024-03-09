<?php

namespace App\Livewire\Dashboard\Menu\Plans\Components;

use App\Livewire\Forms\PlanForm;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class PlansEdit extends Component
{

    use HelperTrait;
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





        // 1.2: setFilePreview
        $preview = asset('storage/menu/plans/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-2', defaultPreview: $preview);



    } // end function








    // -----------------------------------------------------------




    public function update()
    {



        // :: refresh / closeModal
        $this->instance->reset();

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-plan .btn--close');
        $this->dispatch('resetFile', file: 'plan--file-2', defaultPreview: $this->getDefaultPreview());




        // :: alert
        $this->makeAlert('success', 'Plan has been updated');




    } // end function











    // -----------------------------------------------------------



    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.components.plans-edit');

    } // end function


} // end class
