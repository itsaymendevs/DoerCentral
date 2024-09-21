<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Bundles\Components;

use App\Livewire\Forms\BundleForm;
use App\Models\Bundle;
use App\Models\BundleFeature;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BundlesCreate extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BundleForm $instance;






    public function store()
    {



        // 1: validation
        $this->instance?->validate();

        if (count($this->instance->features ?? []) == 0) {

            return false;

        } // end if






        // 1.2: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'bundles', 'BUN');








        // 2: create instance
        $bundle = new Bundle();

        $bundle->name = $this->instance->name;
        $bundle->nameURL = $this->getNameURL($this->instance->name);
        $bundle->price = $this->instance->price ?? 0;
        $bundle->imageFile = $this->instance->imageFileName ?? null;



        // 2.1: featureModule
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



                // 2.7: isDefault
                if ($this->instance?->isDefaults && ($this->instance?->isDefaults[$feature] ?? false)) {

                    $bundleFeature->isDefault = true;

                } else {

                    $bundleFeature->isDefault = false;

                } // end if



                $bundleFeature->save();



            } // end if

        } // end loop









        // 3: refresh - alert
        $this->instance?->reset();

        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-bundle .btn--close');
        $this->dispatch('resetFile', file: 'bundle--file-1', defaultPreview: $this->getDefaultPreview());


        $this->makeAlert('success', 'Bundle has been created');

    } // end function












    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $featureModules = FeatureModule::all();
        $features = Feature::where('featureModuleId', $this->instance?->featureModuleId)?->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.central.dashboard.manage-plans.bundles.components.bundles-create', compact('featureModules', 'features'));


    } // end function




} // end class
