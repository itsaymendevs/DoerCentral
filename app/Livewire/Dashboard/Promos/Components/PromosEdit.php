<?php

namespace App\Livewire\Dashboard\Promos\Components;

use App\Livewire\Forms\PromoCodeForm;
use App\Models\PromoCode;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PromosEdit extends Component
{

    use HelperTrait;




    // :: variables
    public PromoCodeForm $instance;








    #[On('editPromo')]
    public function remount($id)
    {

        // 1: clone instance
        $promoCode = PromoCode::find($id);

        foreach ($promoCode->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function





    // -----------------------------------------------------------








    public function update()
    {

        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/update', $this->instance);






        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-promo .btn--close');



        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');

        return view('livewire.dashboard.promos.components.promos-edit');

    } // end function


} // end class
