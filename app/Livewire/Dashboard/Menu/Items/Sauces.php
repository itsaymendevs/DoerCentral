<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Sauces extends Component
{
    use HelperTrait;
    use WithPagination;



    // :: variables
    public $searchSauce = '';
    public $removeId;







    public function remove($id)
    {


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
        $type = Type::where('name', 'Sauce')->first();

        $sauces = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSauce . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sauces', compact('sauces'));

    } // end function



} // end class

