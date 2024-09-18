<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Plans\Components;

use App\Livewire\Forms\PlanForm;
use App\Models\Bundle;
use App\Models\FeatureModule;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class PlansCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public PlanForm $instance;






    public function store()
    {



        // :: validate
        $this->instance->validate();


        if (count($this->instance->bundles ?? []) == 0) {

            return false;

        } // end if






        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'plans', 'PLN');







        // 1.2: create instance
        $plan = new Plan();

        $plan->name = $this->instance->name;
        $plan->nameURL = $this->getNameURL($this->instance->name);
        $plan->price = $this->instance->price ?? 0;
        $plan->desc = $this->instance->desc ?? null;



        // 1.3: imageFile
        $plan->imageFile = $this->instance->imageFileName ?? null;

        $plan->save();







        // -------------------------------------------------------
        // -------------------------------------------------------






        // 1.5: loop - bundles
        foreach ($this->instance?->bundles ?? [] as $key => $bundle) {


            // 2.6: create instance
            $planBundle = new PlanBundle();

            $planBundle->bundleId = $bundle;
            $planBundle->planId = $plan->id;

            $planBundle->save();


        } // end loop














        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-plan .btn--close');
        $this->dispatch('resetFile', file: 'plan--file-1', defaultPreview: $this->getDefaultPreview());




        $this->makeAlert('success', 'Plan has been created');




    } // end function









    // -----------------------------------------------------------






    public function resetModule($moduleId)
    {


        // 1: resetModule
        if ($this->instance?->bundles[$moduleId] ?? false) {

            $this->instance->bundles[$moduleId] = null;

        } // end if


    } // end function










    // ------------------------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $modules = FeatureModule::has('bundles')?->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.manage-plans.plans.components.plans-create', compact('modules'));


    } // end function




} // end class
