<?php

namespace App\Livewire\Dashboard\Promos\Components;

use App\Models\PromoCode;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class PromosView extends Component
{

    use HelperTrait;
    use ActivityTrait;


    // :: filter - remove
    public $searchPromoCode = '';






    public function edit($id)
    {


        // 1: dispatchId
        $this->dispatch('editPromo', $id);


    } // end function








    // --------------------------------------------------------------





    public function toggleActive($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // ## log - activity ##
        $promoCode = PromoCode::find($id);

        $this->storeActivity('Menu', "Toggled hide for promo {$promoCode->name}");






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/toggle', $id);


        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function









    // --------------------------------------------------------------





    public function toggleForWebsite($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------



        // ## log - activity ##
        $promoCode = PromoCode::find($id);

        $this->storeActivity('Menu', "Toggled hide [website] for promo {$promoCode->name}");




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/toggleForWebsite', $id);


        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function










    // -----------------------------------------------------------------




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

        $this->makeAlert('remove', null, 'confirmPromoCodeRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmPromoCodeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // ## log - activity ##
            $promoCode = PromoCode::find($this->removeId);

            $this->storeActivity('Menu', "Removed promo {$promoCode->name}");




            // 1.2: makeRequest
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
        $promoCodes = PromoCode::where('code', 'LIKE', '%' . $this->searchPromoCode . '%')
            ->orderBy('created_at', 'desc')
            ->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.promos.components.promos-view', compact('promoCodes'));


    } // end function




} // end class
