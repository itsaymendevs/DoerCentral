<?php

namespace App\Livewire\DriverPortal;

use App\Livewire\Forms\DriverForm;
use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;



#[Layout('livewire.layouts.portals.driver.dashboard')]
class DriverProfileEdit extends Component
{


    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public DriverForm $instance;
    public $driver;





    public function mount()
    {



        // :: init
        $this->driver = Driver::find(session('driverId'));


        foreach ($this->driver->toArray() as $key => $value)
            $this->instance->{$key} = $value;





        // :: syncImageFiles
        $this->instance->imageFile = $this->instance->imageFileName = $this->driver->imageFile ?? null;
        $this->instance->licenseFile = $this->instance->licenseFileName = $this->driver->licenseFile ?? null;





    } // end function







    // ----------------------------------------------------------







    public function update()
    {




        // 1: replaceFile
        if ($this->instance->licenseFile != $this->instance->licenseFileName) {

            $this->instance->licenseFileName = $this->replaceFile($this->instance->licenseFile, 'delivery/drivers/licenses', $this->instance->licenseFileName, 'LIC');

        } // end if



        // 1.2: replaceFile
        if ($this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'delivery/drivers/profiles', $this->instance->imageFileName, 'PRO');

        } // end if











        // 1.2: makeRequest
        $response = $this->makeRequest('portals/driver/profile/update', $this->instance);

        $this->makeAlert('success', $response->message);





    } // end function











    // ----------------------------------------------------------









    public function render()
    {



        return view('livewire.driver-portal.driver-profile-edit');



    } // end function



} // end class
