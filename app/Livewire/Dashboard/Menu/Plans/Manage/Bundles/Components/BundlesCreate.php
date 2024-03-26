<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Livewire\Forms\PlanBundleForm;
use App\Models\MealType;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BundlesCreate extends Component
{

    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public PlanBundleForm $instance;





    public function mount($id)
    {


        // :: params
        $this->instance->planId = $id;


        // :: loop - init mealTypes
        $mealTypes = MealType::all();

        foreach ($mealTypes as $mealType)
            $this->instance->mealTypes[$mealType->id] = 0;





    } // end function







    // ------------------------------------------------------------------







    public function store()
    {



        // :: validation
        $this->instance->validate();



        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/plans/bundles/');




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/store', $this->instance);












        // :: resetForm - resetFilePreview
        $this->instance->reset('name', 'mealTypes', 'remarks', 'imageFile', 'imageFileName');
        $this->dispatch('closeModal', modal: '#new-bundle .btn--close');
        $this->dispatch('resetFile', file: 'bundle--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);






        // :: reset mealTypes
        $mealTypes = MealType::all();

        foreach ($mealTypes as $mealType)
            $this->instance->mealTypes[$mealType->id] = 0;




    } // end function










    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();
        $types = Type::whereIn('name', ['Recipe', 'Side', 'Snack', 'Drink'])->get();





        // -----------------------------
        // -----------------------------






        // 1.2: getMealTypesCounter by Type
        $mealTypesCounter = [];


        // :: loop - types
        foreach ($types as $type) {


            // :: loop - mealTypes
            foreach ($type->mealTypes as $mealType) {

                $mealTypesCounter[$type->id] = ($mealTypesCounter[$type->id] ?? 0)
                    + $this->instance->mealTypes[$mealType->id];


            } // end loop

        } // end loop







        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-create', compact('mealTypes', 'types', 'mealTypesCounter'));


    } // end function


} // end class
