<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Drinks extends Component
{
    use HelperTrait;
    use ActivityTrait;
    use WithPagination;




    // :: variables
    public $searchDrink = '';
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

        $this->makeAlert('remove', null, 'confirmDrinkRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmDrinkRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $drink = Meal::find($this->removeId);
            $this->removeFile($drink->imageFile, 'menu/meals');
            $this->removeFile($drink->secondImageFile, 'menu/meals');

            $drink->thirdImageFile ? $this->removeFile($drink->thirdImageFile, 'menu/meals') : null;
            $drink->fourthImageFile ? $this->removeFile($drink->fourthImageFile, 'menu/meals') : null;




            // ## log - activity ##
            $this->storeActivity('Menu', "Removed drink {$drink->name}");



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
        $type = Type::where('name', 'Drink')->first();

        $drinks = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchDrink . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'));







        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.drinks', compact('drinks'));

    } // end function



} // end class


