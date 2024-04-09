<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Models\Plan;
use App\Models\PlanBundle;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class BundlesMigrate extends Component
{

    use HelperTrait;



    // :: variables
    public $bundle;
    public $selectedPlans = [];










    #[On('migrateBundle')]
    public function remount($id)
    {

        // 1: get instance
        $this->bundle = PlanBundle::find($id);


        $this->render();


    } // end function








    // -----------------------------------------------------------





    public function migrate()
    {



        // :: validation
        if ($this->selectedPlans && in_array(true, $this->selectedPlans)) {



            // 1: filterSelectedPlans
            $selectedPlans = array_filter($this->selectedPlans, function ($value, $key) {
                return $value == true;
            }, ARRAY_FILTER_USE_BOTH);




            // 1.2: create instance
            $instance = new stdClass();
            $instance->id = $this->bundle->id;
            $instance->plans = $selectedPlans;








            // -------------------------------------
            // -------------------------------------




            // 1.3: loop - plans
            foreach ($selectedPlans as $planId => $isChecked) {




                // 1.2: copyFile (source - destination)
                $imageFile = 'migrated-bundle-' . $planId . $this->bundle->id . $this->bundle->imageFile;


                Storage::copy("public/menu/plans/bundles/{$this->bundle->imageFile}",
                    "public/menu/plans/bundles/{$imageFile}");



            } // end loop







            // -------------------------------------
            // -------------------------------------







            // 1.5: makeRequest
            $response = $this->makeRequest('dashboard/menu/plans/bundles/migrate', $instance);






            // :: resetForm - resetFilePreview
            $this->bundle = null;
            $this->reset('selectedPlans');
            $this->dispatch('closeModal', modal: '#migrate-bundle .btn--close');


            $this->makeAlert('success', $response->message);




        } else {




            // :: requireAlert
            $this->makeAlert('info', 'Please select at least one plan');

        } // end if




    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $plans = $this->bundle ? Plan::where('id', '!=', $this->bundle->planId)->get() : [];







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-migrate', compact('plans'));

    } // end function


} // end class


