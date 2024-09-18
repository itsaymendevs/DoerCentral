<?php

namespace App\Livewire\Dashboard\ManagePlans\Bundles\Components;

use App\Livewire\Forms\BundleForm;
use App\Models\Bundle;
use App\Models\BundleFeature;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Component;

class BundlesCreate extends Component
{


    use HelperTrait;


    // :: variables
    public BundleForm $instance;






    public function store()
    {



        // 1: validation
        $this->instance?->validate();

        if (count($this->instance->features ?? []) == 0) {

            return false;

        } // end if







        // 2: create instance
        $bundle = new Bundle();

        $bundle->name = $this->instance->name;
        $bundle->nameURL = $this->getNameURL($this->instance->name);

        $bundle->featureModuleId = $this->instance->featureModuleId;

        $bundle->save();







        // --------------------------------------------------
        // --------------------------------------------------







        // 2.5: loop - features
        foreach ($this->instance?->features ?? [] as $feature => $isChecked) {


            // 2.6: create instance
            if ($isChecked) {

                $bundleFeature = new BundleFeature();

                $bundleFeature->featureId = $feature;
                $bundleFeature->bundleId = $bundle->id;

                $bundleFeature->save();

            } // end if


        } // end loop









        // 3: refresh - alert
        $this->instance?->reset();

        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->makeAlert('success', 'Bundle has been created');
        $this->dispatch('closeModal', modal: '#new-bundle .btn--close');



    } // end function












    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $featureModules = FeatureModule::all();
        $features = Feature::where('featureModuleId', $this->instance?->featureModuleId)?->get();




        return view('livewire.dashboard.manage-plans.bundles.components.bundles-create', compact('featureModules', 'features'));


    } // end function




} // end class
