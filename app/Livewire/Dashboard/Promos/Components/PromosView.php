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


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/toggleForWebsite', $id);


        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function










    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPromoCodeRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmPromoCodeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/promo/promoCodes/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if




        // 1.2: refreshViews
        $this->dispatch('refreshViews');



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
