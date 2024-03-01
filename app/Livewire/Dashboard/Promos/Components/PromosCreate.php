<?php

namespace App\Livewire\Dashboard\Promos\Components;

use App\Livewire\Forms\PromoCodeForm;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;



class PromosCreate extends Component
{

    use HelperTrait;


    // :: variables
    public PromoCodeForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-promo .btn--close');
        $this->dispatch('initTooltips');



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function






    // --------------------------------------------------------------------






    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.promos.components.promos-create');

    } // end function



} // end class
