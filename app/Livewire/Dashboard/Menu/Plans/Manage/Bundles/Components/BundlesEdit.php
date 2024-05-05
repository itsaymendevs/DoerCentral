<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Livewire\Forms\PlanBundleForm;
use App\Models\MealType;
use App\Models\PlanBundle;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class BundlesEdit extends Component
{

    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public PlanBundleForm $instance;









    #[On('editBundle')]
    public function remount($id)
    {

        // 1: get instance
        $bundle = PlanBundle::find($id);

        foreach ($bundle->toArray() as $key => $value)
            $this->instance->{$key} = $value;

        $this->instance->imageFileName = $this->instance->imageFile;






        // 1.2: setFilePreview
        $preview = asset('storage/menu/plans/bundles/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'bundle--preview-2', defaultPreview: $preview);





        // 1.3: setMealTypes
        foreach ($bundle->types as $type)
            $this->instance->mealTypes[$type->mealTypeId] = $type->quantity;




    } // end function








    // -----------------------------------------------------------




    public function update()
    {




        // 1: uploadFileFiles
        if ($this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'menu/plans/bundles', $this->instance->imageFileName, 'BUN');

        } // end if






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/plans/bundles/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('closeModal', modal: '#edit-bundle .btn--close');
        $this->dispatch('resetFile', file: 'bundle--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------------







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
                    + ($this->instance->mealTypes[$mealType->id] ?? 0);


            } // end loop

        } // end loop








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-edit', compact('mealTypes', 'types', 'mealTypesCounter'));

    } // end function


} // end class
