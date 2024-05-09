<?php

namespace App\Livewire\Dashboard\Promos\Components;

use App\Livewire\Forms\PromoCodeForm;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;



class PromosCreate extends Component
{

    use HelperTrait;
    use ActivityTrait;

    // :: variables
    public PromoCodeForm $instance;








    public function store()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();



        // ## log - activity ##
        $this->storeActivity('Menu', "Created promo {$this->instance->name}");




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/promo/promoCodes/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-promo .btn--close');
        $this->dispatch('initTooltips');



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function






    // --------------------------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $plans = Plan::all();




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.promos.components.promos-create', compact('plans'));

    } // end function



} // end class
