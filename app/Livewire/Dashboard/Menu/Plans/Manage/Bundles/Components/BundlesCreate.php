<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage\Bundles\Components;

use App\Livewire\Forms\PlanBundleForm;
use App\Models\MealType;
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
        $this->instance->reset();
        $this->dispatch('closeModal', modal: '#new-bundle .btn--close');
        $this->dispatch('resetFile', file: 'bundle--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function










    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();



        return view('livewire.dashboard.menu.plans.manage.bundles.components.bundles-create', compact('mealTypes'));


    } // end function


} // end class
