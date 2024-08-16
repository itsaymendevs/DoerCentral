<?php

namespace App\Livewire\Dashboard\Extra\WebApps\Settings\Components;

use App\Livewire\Forms\SubscriptionSettingsForm;
use App\Models\SubscriptionSetting;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsPlans extends Component
{


   use HelperTrait;
   use WithFileUploads;


   // :: variables
   public SubscriptionSettingsForm $instance;







   public function mount()
   {





      // 1: subscription
      $settings = SubscriptionSetting::first();


      foreach ($settings->toArray() as $key => $value)
         $this->instance->{$key} = $value;



      $this->instance->planCustomSectionImageFileName = $this->instance->planCustomSectionImageFile;

      $this->instance->planCustomSectionSecondImageFileName = $this->instance->planCustomSectionSecondImageFile ?? null;

      $this->instance->planCustomSectionThirdImageFileName = $this->instance->planCustomSectionThirdImageFile ?? null;

      $this->instance->planCustomSectionFourthImageFileName = $this->instance->planCustomSectionFourthImageFile ?? null;

      $this->instance->planCustomSectionFifthImageFileName = $this->instance->planCustomSectionFifthImageFile ?? null;

      $this->instance->planCustomSectionSixthImageFileName = $this->instance->planCustomSectionSixthImageFile ?? null;






      // 1.2: setFilePreview
      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-1', defaultPreview: $this->instance->planCustomSectionImageFile ? $preview : $this->getDefaultPreview());


      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionSecondImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-2', defaultPreview: $this->instance->planCustomSectionSecondImageFile ? $preview : $this->getDefaultPreview());


      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionThirdImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-3', defaultPreview: $this->instance->planCustomSectionThirdImageFile ? $preview : $this->getDefaultPreview());


      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionFourthImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-4', defaultPreview: $this->instance->planCustomSectionFourthImageFile ? $preview : $this->getDefaultPreview());



      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionFifthImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-5', defaultPreview: $this->instance->planCustomSectionFifthImageFile ? $preview : $this->getDefaultPreview());



      $preview = url('storage/extra/subscription/custom/' . $this->instance->planCustomSectionSixthImageFile);
      $this->dispatch('setFilePreview', filePreview: 'custom--preview-6', defaultPreview: $this->instance->planCustomSectionSixthImageFile ? $preview : $this->getDefaultPreview());









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








      // 1: replaceFiles
      if ($this->instance->planCustomSectionImageFile != $this->instance->planCustomSectionImageFileName)
         $this->instance->planCustomSectionImageFileName = $this->replaceFile($this->instance->planCustomSectionImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionImageFileName, 'SFI');




      if ($this->instance->planCustomSectionSecondImageFile != $this->instance->planCustomSectionSecondImageFileName)
         $this->instance->planCustomSectionSecondImageFileName = $this->replaceFile($this->instance->planCustomSectionSecondImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionSecondImageFileName, 'SSE');




      if ($this->instance->planCustomSectionThirdImageFile != $this->instance->planCustomSectionThirdImageFileName)
         $this->instance->planCustomSectionThirdImageFileName = $this->replaceFile($this->instance->planCustomSectionThirdImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionThirdImageFileName, 'STH');



      if ($this->instance->planCustomSectionFourthImageFile != $this->instance->planCustomSectionFourthImageFileName)
         $this->instance->planCustomSectionFourthImageFileName = $this->replaceFile($this->instance->planCustomSectionFourthImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionFourthImageFileName, 'SFO');





      if ($this->instance->planCustomSectionFifthImageFile != $this->instance->planCustomSectionFifthImageFileName)
         $this->instance->planCustomSectionFifthImageFileName = $this->replaceFile($this->instance->planCustomSectionFifthImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionFifthImageFileName, 'SFO');






      if ($this->instance->planCustomSectionSixthImageFile != $this->instance->planCustomSectionSixthImageFileName)
         $this->instance->planCustomSectionSixthImageFileName = $this->replaceFile($this->instance->planCustomSectionSixthImageFile, 'extra/subscription/custom', $this->instance->planCustomSectionSixthImageFileName, 'SFO');








      // ------------------------------------------------
      // ------------------------------------------------







      // 2: makeRequest
      $response = $this->makeRequest('dashboard/extra/settings/subscription/update', $this->instance);




      // 2.1: alert
      $this->makeAlert('success', $response?->message);





   } // end function












   // -----------------------------------------------------------










   public function updateTemplate($name)
   {




      // :: rolePermission
      if (! session('globalUser')->checkPermission('Edit Actions')) {

         $this->makeAlert('info', 'Editing is not allowed for this account');

         return false;

      } // end if








      // --------------------------------------
      // --------------------------------------







      // 2: makeRequest
      $this->instance->template = $name;

      $response = $this->makeRequest('dashboard/extra/settings/subscription/update', $this->instance);




      // 2.1: alert
      $this->makeAlert('success', $response?->message);








   } // end if






   // -----------------------------------------------------------









   public function render()
   {



      // 1: dependencies
      $alignments = ['left', 'center', 'right'];





      // :: initTooltips
      $this->dispatch('initTooltips');



      return view('livewire.dashboard.extra.web-apps.settings.components.settings-plans', compact('alignments'));


   } // end function






} // end class
