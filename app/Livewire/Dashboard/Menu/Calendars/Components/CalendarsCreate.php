<?php

namespace App\Livewire\Dashboard\Menu\Calendars\Components;

use App\Livewire\Forms\MenuCalendarForm;
use App\Models\Diet;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class CalendarsCreate extends Component
{

    use HelperTrait;
    use ActivityTrait;
    use WithFileUploads;



    // :: variables
    public MenuCalendarForm $instance;




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




        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'menu/calendars', 'CLN');





        // ## log - activity ##
        $this->storeActivity('Menu', "Created calendar {$this->instance->name}");




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/calendars/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-calendar .btn--close');
        $this->dispatch('resetFile', file: 'calendar--file-1', defaultPreview: $this->getDefaultPreview());




        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $diets = Diet::all();
        $plans = Plan::all();


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.calendars.components.calendars-create', compact('diets', 'plans'));


    } // end function




} // end class

