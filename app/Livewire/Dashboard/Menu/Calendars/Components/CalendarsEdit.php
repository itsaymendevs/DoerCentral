<?php

namespace App\Livewire\Dashboard\Menu\Calendars\Components;

use App\Livewire\Forms\MenuCalendarForm;
use App\Models\Diet;
use App\Models\MenuCalendar;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CalendarsEdit extends Component
{


   use HelperTrait;
   use ActivityTrait;
   use WithFileUploads;



   // :: variables
   public MenuCalendarForm $instance;








   #[On('editCalendar')]
   public function remount($id)
   {



      // 1: clone instance
      $calendar = MenuCalendar::find($id);

      foreach ($calendar->toArray() as $key => $value)
         $this->instance->{$key} = $value;


      $this->instance->imageFileName = $this->instance->imageFile;





      // 1.2: setFilePreview
      $preview = url('storage/menu/calendars/' . $this->instance->imageFile);
      $this->dispatch('setFilePreview', filePreview: 'calendar--preview-2', defaultPreview: $preview);





      // 1.3: setSelect
      $this->dispatch('setSelect', id: '#plan-select-2', value: $calendar?->plans?->pluck('planId')->toArray());
      $this->dispatch('setSelect', id: '#diet-select-2', value: $calendar?->diets?->pluck('dietId')->toArray());



   } // end function








   // -----------------------------------------------------------




   public function update()
   {




      // :: rolePermission
      if (! session('globalUser')->checkPermission('Edit Actions')) {

         $this->makeAlert('info', 'Editing is not allowed for this account');

         return false;

      } // end if





      // --------------------------------------
      // --------------------------------------






      // 1: uploadFile
      if ($this->instance->imageFile != $this->instance->imageFileName)
         $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'menu/calendars', $this->instance->imageFileName, 'CLN');






      // ## log - activity ##
      $this->storeActivity('Menu', "Updated Calendar {$this->instance->name}");



      // 1.2: makeRequest
      $response = $this->makeRequest('dashboard/menu/calendars/update', $this->instance);







      // :: refresh / closeModal
      $this->instance->reset();
      $this->dispatch('resetSelect');

      $this->dispatch('refreshViews');
      $this->dispatch('closeModal', modal: '#edit-calendar .btn--close');
      $this->dispatch('resetFile', file: 'calendar--file-2', defaultPreview: $this->getDefaultPreview());




      // :: alert
      $this->makeAlert('success', $response->message);




   } // end function











   // -----------------------------------------------------------






   public function render()
   {


      // 1: dependencies
      $diets = Diet::all();
      $plans = Plan::all();


      // :: initTooltips
      $this->dispatch('initTooltips');


      return view('livewire.dashboard.menu.calendars.components.calendars-edit', compact('diets', 'plans'));


   } // end function


} // end class
