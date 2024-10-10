<?php

namespace App\Livewire\Home\Components\Plans\Components;

use App\Livewire\Forms\CustomizePlanForm;
use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PlansModule extends Component
{



    use HelperTrait;



    // :: variables
    public CustomizePlanForm $instance;

    public $module, $features;








    #[On('viewModule')]
    public function remount($id)
    {


        // 1: getModule
        $this->module = FeatureModule::find($id);
        $this->features = Feature::whereIn('id', $this->module?->features?->pluck('id')?->toArray() ?? [])?->get();



        // 1.2: init instance
        $selectedFeatures = [];
        $this->instance->featureModuleId = $this->module->id;



        foreach ($this->features ?? [] as $feature) {

            $this->instance->features[$feature->id] = $feature->isDefault ? true : false;
            $this->instance->prices[$feature->id] = $feature->isDefault ? $feature->price ?? 0 : 0;


            // 1.3: getSelectedFeatures
            $feature->isDefault ? array_push($selectedFeatures, $feature->id) : null;

        } // end loop







        // 1.3: getTotalPrice
        $this->instance->totalPrice = array_sum($this->instance->prices ?? []) ?? 0;


        // 1.4: syncParent
        $this->dispatch('calculateTotalPrice', ['featureModuleId' => $this->instance->featureModuleId, 'features' => $selectedFeatures, 'price' => $this->instance->totalPrice]);



    } // end function











    // ------------------------------------------------------------------------







    public function update()
    {


        // 1: getFeatures
        $selectedFeatures = array_filter($this->instance->features ?? [], function ($value, $key) {

            return $value == true;

        }, ARRAY_FILTER_USE_BOTH);

        $selectedFeatures = array_keys($selectedFeatures ?? []);





        // ----------------------------------------------------
        // ----------------------------------------------------






        // 2: loop - features
        foreach ($this->features ?? [] as $feature) {

            if (in_array($feature->id, $selectedFeatures)) {

                $this->instance->features[$feature->id] = true;
                $this->instance->prices[$feature->id] = $feature->price ?? 0;

            } else {

                $this->instance->features[$feature->id] = false;
                $this->instance->prices[$feature->id] = 0;

            } // end if


        } // end loop









        // 2.1: getTotalPrice
        $this->instance->totalPrice = array_sum($this->instance->prices ?? []) ?? 0;

        // 1.4: syncParent
        $this->dispatch('calculateTotalPrice', ['featureModuleId' => $this->instance->featureModuleId, 'features' => $selectedFeatures, 'price' => $this->instance->totalPrice]);




    } // end function










    // --------------------------------------------------------------------







    public function render()
    {

        return view('livewire.home.components.plans.components.plans-module');

    } // end function





} // end class
