<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Plans\Components;

use App\Livewire\Forms\PlanForm;
use App\Models\FeatureModule;
use App\Models\Plan;
use App\Models\PlanBundle;
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



        // 1: get instance
        $plan = Plan::find($id);

        foreach ($plan->toArray() as $key => $value)
            $this->instance->{$key} = $value;






        // --------------------------------
        // --------------------------------



        $this->instance->imageFileName = $this->instance->imageFile;





        // 1.2: setFilePreview
        $preview = url('storage/plans/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'plan--preview-2', defaultPreview: $preview);






        // 1.3: setBundles
        $this->instance->bundles = $plan?->bundlesInForm();




    } // end function







    // -----------------------------------------------------------






    public function resetModule($moduleId)
    {



        // 1: resetModule
        if ($this->instance?->bundles[$moduleId] ?? false) {

            $this->instance->bundles[$moduleId] = null;

        } // end if


    } // end function











    // -----------------------------------------------------------








    public function update()
    {





        // 1: validation
        $this->instance?->validate();

        if (count($this->instance->bundles ?? []) == 0) {

            return false;

        } // end if






        // 1: replaceFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'plans', $this->instance->imageFileName, 'PLN');






        // 1.2: create instance
        $plan = Plan::find($this->instance->id);

        $plan->name = $this->instance->name;
        $plan->nameURL = $this->getNameURL($this->instance->name);
        $plan->price = $this->instance->price ?? 0;
        $plan->desc = $this->instance->desc ?? null;



        // 1.3: imageFile
        $plan->imageFile = $this->instance->imageFileName ?? null;

        $plan->save();







        // -------------------------------------------------------
        // -------------------------------------------------------






        // 1.5: loop - bundles - removePrevious
        PlanBundle::where('planId', $plan->id)?->delete();

        foreach ($this->instance?->bundles ?? [] as $key => $bundle) {


            // 2.6: create instance
            $planBundle = new PlanBundle();

            $planBundle->bundleId = $bundle;
            $planBundle->planId = $plan->id;

            $planBundle->save();


        } // end loop










        // 3: refresh - alert
        $this->instance?->reset();

        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->makeAlert('success', 'Plan has been update');
        $this->dispatch('closeModal', modal: '#edit-plan .btn--close');



    } // end function












    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $modules = FeatureModule::has('bundles')?->get();




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.central.dashboard.manage-plans.plans.components.plans-edit', compact('modules'));


    } // end function




} // end class
