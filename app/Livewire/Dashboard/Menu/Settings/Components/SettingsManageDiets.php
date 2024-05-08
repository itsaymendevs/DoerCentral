<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\DietForm;
use App\Models\Diet;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsManageDiets extends Component
{

    use HelperTrait;



    // :: variables
    public DietForm $instance;







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




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/diets/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------














    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $diets = Diet::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.settings.components.settings-manage-diets', compact('diets'));

    } // end function



} // end class


