<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Snacks extends Component
{

    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variables
    public $searchSnack = '', $searchPartType;
    public $removeId;







    public function remove($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed snack {$snack->name}");



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/meals/remove', $this->removeId);

            $this->makeAlert('info', $response->message);


        } // end if






        // 1.2: renderView
        $this->render();


    } // end function









    // ---------------------------------------------------------------









    public function editMenuList($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editMenuList', $id);


    } // end function








    // ---------------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Snack')->first();
        $snackTypes = ['Sweet', 'Savoury'];









        // 1.2: filter
        if ($this->searchPartType) {


            $snacks = Meal::where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchSnack . '%')
                ->where('partType', $this->searchPartType)
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));



            // 1.2: regular
        } else {

            $snacks = Meal::where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchSnack . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));


        } // end if










        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.snacks', compact('snacks', 'snackTypes'));

    } // end function



} // end class

