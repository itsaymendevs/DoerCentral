<?php

namespace App\Livewire\Dashboard\Promos\Components;

use App\Models\PromoCode;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class PromosView extends Component
{

    use HelperTrait;


    // :: filter - remove
    public $searchPromoCode = '';
    public $removeId;






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editPromo', $id);


    } // end function




    // --------------------------------------------------------------





    public function toggleForWebsite($id)
    {

        // 1: dispatchId
        $promoCode = PromoCode::find($id);

        $promoCode->isForWebsite = ! boolval($promoCode->isForWebsite);
        $promoCode->save();



        $this->makeAlert('success', 'Status has been updated');



    } // end function










    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmRemove')]
    public function confirmRemove()
    {



        // 1: remove
        PromoCode::find($this->removeId)->delete();
        $this->makeAlert('info', 'PromoCode has been removed');


        // 1.2: renderView
        $this->render();


    } // end function






    // --------------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $promoCodes = PromoCode::where('code', 'LIKE', '%' . $this->searchPromoCode . '%')->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.promos.components.promos-view', compact('promoCodes'));


    } // end function




} // end class
