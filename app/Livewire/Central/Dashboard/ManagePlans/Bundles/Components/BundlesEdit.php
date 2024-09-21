<?php

namespace App\Livewire\Central\Dashboard\ManagePlans\Bundles\Components;

use App\Livewire\Forms\BundleForm;
use App\Models\Bundle;
use App\Models\BundleFeature;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class BundlesEdit extends Component
{




    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public BundleForm $instance;






    #[On('editBundle')]
    public function remount($id)
    {



        // 1: get instance
        $bundle = Bundle::find($id);

        foreach ($bundle->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // --------------------------------
        // --------------------------------



        // 1.2: setFilePreview
        $this->instance->imageFileName = $this->instance->imageFile;


        $preview = url('storage/bundles/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'bundle--preview-2', defaultPreview: $preview);







        // 1.3: setModule
        $this->dispatch('setSelect', id: '#bundle--module-select-2', value: $this->instance->featureModuleId);


        // 1.4: setFeatures - setDefaults
        $this->instance->features = $bundle?->featuresInForm();
        $this->instance->isDefaults = $bundle?->defaultsInForm();




    } // end function








    // -----------------------------------------------------------








    public function update()
    {



        // 1: validation
        $this->instance?->validate();

        if (count($this->instance->features ?? []) == 0) {

            return false;

        } // end if







        // 1.2: replaceFile
        if ($this->instance->imageFile != $this->instance->imageFileName)
            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'bundles', $this->instance->imageFileName, 'BUN');









        // 2: get instance
        $bundle = Bundle::find($this->instance->id);

        $bundle->name = $this->instance->name;
        $bundle->nameURL = $this->getNameURL($this->instance->name);
        $bundle->price = $this->instance->price ?? 0;
        $bundle->imageFile = $this->instance->imageFileName ?? null;


        // 2.1: featureModule
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
        $this->dispatch('closeModal', modal: '#edit-bundle .btn--close');
        $this->dispatch('resetFile', file: 'bundle--file-2', defaultPreview: $this->getDefaultPreview());

        $this->makeAlert('success', 'Bundle has been update');


    } // end function












    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $featureModules = FeatureModule::all();
        $features = Feature::where('featureModuleId', $this->instance?->featureModuleId)?->get();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.manage-plans.bundles.components.bundles-edit', compact('featureModules', 'features'));


    } // end function




} // end class
