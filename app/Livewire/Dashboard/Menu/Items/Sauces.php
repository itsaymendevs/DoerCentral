<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Sauces extends Component
{
    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variables
    public $searchSauce = '', $searchPartType;
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

        $this->makeAlert('remove', null, 'confirmSauceRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmSauceRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $sauce = Meal::find($this->removeId);
            $this->removeFile($sauce->imageFile, 'menu/meals');
            $this->removeFile($sauce->secondImageFile, 'menu/meals');

            $sauce->thirdImageFile ? $this->removeFile($sauce->thirdImageFile, 'menu/meals') : null;
            $sauce->fourthImageFile ? $this->removeFile($sauce->fourthImageFile, 'menu/meals') : null;



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed sauce {$sauce->name}");




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
        $type = Type::where('name', 'Sauce')->first();
        $sauceTypes = ['On Side', 'Part of Meal'];







        // 1.2: filter
        if ($this->searchPartType) {


            $sauces = Meal::where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchSauce . '%')
                ->where('partType', $this->searchPartType)
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));



            // 1.2: regular
        } else {

            $sauces = Meal::where('typeId', $type->id)
                ->where('name', 'LIKE', '%' . $this->searchSauce . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(env('PAGINATE_LG'));


        } // end if








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sauces', compact('sauces', 'sauceTypes'));

    } // end function



} // end class

