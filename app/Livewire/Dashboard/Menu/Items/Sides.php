<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Sides extends Component
{
    use HelperTrait;
    use ActivityTrait;
    use WithPagination;



    // :: variables
    public $searchSide = '';
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

        $this->makeAlert('remove', null, 'confirmSideRemove');



    } // end function









    // -----------------------------------------------------------------------------









    #[On('confirmSideRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // :: get instance - removeFile
            $side = Meal::find($this->removeId);
            $this->removeFile($side->imageFile, 'menu/meals');
            $this->removeFile($side->secondImageFile, 'menu/meals');

            $side->thirdImageFile ? $this->removeFile($side->thirdImageFile, 'menu/meals') : null;
            $side->fourthImageFile ? $this->removeFile($side->fourthImageFile, 'menu/meals') : null;




            // ## log - activity ##
            $this->storeActivity('Menu', "Removed side {$side->name}");



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
        $type = Type::where('name', 'Side')->first();

        $sides = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSide . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(env('PAGINATE_LG'));








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sides', compact('sides'));

    } // end function



} // end class
