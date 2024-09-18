<?php

namespace App\Livewire\Dashboard\ManagePlans\Bundles\Components;

use App\Livewire\Forms\BundleForm;
use App\Models\Bundle;
use App\Models\BundleFeature;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class BundlesEdit extends Component
{




    use HelperTrait;


    // :: variables
    public BundleForm $instance;






    #[On('editBundle')]
    public function remount($id)
    {



        // 1: get instance
        $bundle = Bundle::find($id);

        foreach ($bundle->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.2: setModule
        $this->dispatch('setSelect', id: '#bundle--module-select-2', value: $this->instance->featureModuleId);


        // 1.3: setFeatures
        $this->instance->features = $bundle?->featuresInForm();





    } // end function








    // -----------------------------------------------------------








    public function update()
    {



        // 1: validation
        $this->instance?->validate();

        if (count($this->instance->features ?? []) == 0) {

            return false;

        } // end if







        // 2: get instance
        $bundle = Bundle::find($this->instance->id);

        $bundle->name = $this->instance->name;
        $bundle->nameURL = $this->getNameURL($this->instance->name);

        $bundle->featureModuleId = $this->instance->featureModuleId;

        $bundle->save();







        // --------------------------------------------------
        // --------------------------------------------------







        // 2.5: loop - features - removePrevious
        BundleFeature::where('bundleId', $bundle?->id)?->delete();

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
        $this->makeAlert('success', 'Bundle has been update');
        $this->dispatch('closeModal', modal: '#edit-bundle .btn--close');



    } // end function












    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $featureModules = FeatureModule::all();
        $features = Feature::where('featureModuleId', $this->instance?->featureModuleId)?->get();




        return view('livewire.dashboard.manage-plans.bundles.components.bundles-edit', compact('featureModules', 'features'));


    } // end function




} // end class
