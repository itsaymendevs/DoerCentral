<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Cuisine;
use App\Models\Diet;
use App\Models\Meal;
use App\Models\Tag;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductionBuilderUpdateGeneral extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public MealForm $instance;






    public function mount($id)
    {



        // :: call prepMount
        $this->prepMount($id);


    } // end function






    // -----------------------------------------------------








    public function prepMount($id)
    {



        // 1: clone instance
        $meal = Meal::find($id);

        foreach ($meal->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->imageFileName = $this->instance->imageFile;
        $this->instance->secondImageFileName = $this->instance->secondImageFile;
        $this->instance->thirdImageFileName = $this->instance->thirdImageFile;
        $this->instance->fourthImageFileName = $this->instance->fourthImageFile;








        // 1.2: setFilePreview
        $preview = asset('storage/menu/meals/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'item--preview-1', defaultPreview: $preview);

        $preview = asset('storage/menu/meals/' . $this->instance->secondImageFile);
        $this->dispatch('setFilePreview', filePreview: 'item--preview-2', defaultPreview: $preview);


        if ($this->instance->thirdImageFile) {

            $preview = asset('storage/menu/meals/' . $this->instance->thirdImageFile);
            $this->dispatch('setFilePreview', filePreview: 'item--preview-3', defaultPreview: $preview);

        } // end if



        if ($this->instance->fourthImageFile) {

            $preview = asset('storage/menu/meals/' . $this->instance->fourthImageFile);
            $this->dispatch('setFilePreview', filePreview: 'item--preview-4', defaultPreview: $preview);

        } // end if








        // :: setSelect
        $this->dispatch('setSelect', id: '#type-select-2', value: $meal->typeId);
        $this->dispatch('setSelect', id: '#category-select-2', value: $meal->category);
        $this->dispatch('setSelect', id: '#cuisine-select-2', value: $meal->cuisineId);
        $this->dispatch('setSelect', id: '#diet-select-2', value: $meal->dietId);


        $this->dispatch('setSelect', id: '#tags-select-2', value: $meal?->tags?->pluck('tagId')->toArray());




    } // end function







    // -----------------------------------------------------






    public function update()
    {



        // 1: uploadFile
        if ($this->instance->imageFile && $this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/meals');

        } // end if



        if ($this->instance->secondImageFile
            && $this->instance->secondImageFile != $this->instance->secondImageFileName) {

            $this->instance->secondImageFileName = $this->uploadFile($this->instance->secondImageFile, 'menu/meals');

        } // end if




        if ($this->instance->thirdImageFile
            && $this->instance->thirdImageFile != $this->instance->thirdImageFileName) {

            $this->instance->thirdImageFileName = $this->uploadFile($this->instance->thirdImageFile, 'menu/meals');

        } // end if



        if ($this->instance->fourthImageFile
            && $this->instance->fourthImageFile != $this->instance->fourthImageFileName) {

            $this->instance->fourthImageFileName = $this->uploadFile($this->instance->fourthImageFile, 'menu/meals');

        } // end if










        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/general/update', $this->instance);




        // :: alert - redirect to productionBuilder
        $this->makeAlert('success', $response?->message);




        // :: refreshTypeViews
        $this->dispatch('refreshTypeViews', id: $this->instance->id);





    } // end function





    // ------------------------------------------------------------------












    public function render()
    {


        // 1: dependencies
        $types = Type::all();
        $cuisines = Cuisine::all();
        $diets = Diet::all();
        $tags = Tag::all();
        $categories = ['Vegetarian', 'Non-Vegetarian'];




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.production-builder.components.production-builder-update-general', compact('types', 'cuisines', 'diets', 'tags', 'categories'));


    } // end function




} // end class

