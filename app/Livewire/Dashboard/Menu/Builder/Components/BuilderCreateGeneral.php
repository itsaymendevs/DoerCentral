<?php

namespace App\Livewire\Dashboard\Menu\Builder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Cuisine;
use App\Models\Diet;
use App\Models\Tag;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class BuilderCreateGeneral extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public MealForm $instance;






    public function store()
    {



        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/meals');


        if ($this->instance->secondImageFile)
            $this->instance->secondImageFileName = $this->uploadFile($this->instance->secondImageFile, 'menu/meals');

        if ($this->instance->thirdImageFile)
            $this->instance->thirdImageFileName = $this->uploadFile($this->instance->thirdImageFile, 'menu/meals');


        if ($this->instance->fourthImageFile)
            $this->instance->fourthImageFileName = $this->uploadFile($this->instance->fourthImageFile, 'menu/meals');







        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/store', $this->instance);


        $this->makeAlert('success', $response->message);



        // :: resetForm - resetFilePreview
        // $this->instance->reset();
        // $this->dispatch('refreshViews');
        // $this->dispatch('resetFile', file: 'item--file-1', defaultPreview: $this->getDefaultPreview());
        // $this->dispatch('resetFile', file: 'item--file-2', defaultPreview: $this->getDefaultPreview());
        // $this->dispatch('resetFile', file: 'item--file-3', defaultPreview: $this->getDefaultPreview());
        // $this->dispatch('resetFile', file: 'item--file-4', defaultPreview: $this->getDefaultPreview());








    } // end function





    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $types = ['Meal', 'Sub-recipe', 'Snack', 'Side', 'Sauce', 'Drink'];
        $cuisines = Cuisine::all();
        $diets = Diet::all();
        $tags = Tag::all();


        return view('livewire.dashboard.menu.builder.components.builder-create-general', compact('types', 'cuisines', 'diets', 'tags'));


    } // end function




} // end class
