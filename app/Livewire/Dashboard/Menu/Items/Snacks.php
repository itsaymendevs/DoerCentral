<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Snacks extends Component
{

    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchSnack = '';
    public $removeId;







    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmSnackRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmSnackRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $snack = Meal::find($this->removeId);
            $this->removeFile($snack->imageFile, 'menu/meals');
            $this->removeFile($snack->secondImageFile, 'menu/meals');

            $snack->thirdImageFile ? $this->removeFile($snack->thirdImageFile, 'menu/meals') : null;
            $snack->fourthImageFile ? $this->removeFile($snack->fourthImageFile, 'menu/meals') : null;



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/meals/remove', $this->removeId);

            $this->makeAlert('info', $response->message);


        } // end if






        // 1.2: renderView
        $this->render();


    } // end function









    // ---------------------------------------------------------------













    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Snack')->first();

        $snacks = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSnack . '%')
            ->paginate(20);



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.snacks', compact('snacks'));

    } // end function



} // end class

