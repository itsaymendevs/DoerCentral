<?php

namespace App\Livewire\DriverPortal;

use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('livewire.layouts.portals.driver.dashboard')]
class DriverProfile extends Component
{



    use HelperTrait;
    use WithFileUploads;




    // :: variables
    public $driver, $licenseFile, $licenseFileName, $licenseRearFile, $licenseRearFileName;





    public function mount()
    {



        // :: init
        $this->driver = Driver::find(session('driverId'));



        // :: syncLicense
        $this->licenseFile = $this->driver->licenseFile;
        $this->licenseFileName = $this->driver->licenseFile;

        $this->licenseRearFile = $this->driver->licenseRearFile;
        $this->licenseRearFileName = $this->driver->licenseRearFile;


    } // end function







    // ----------------------------------------------------------







    public function updateLicense()
    {




        // 1: replaceFile
        if ($this->licenseFile != $this->licenseFileName) {

            $this->licenseFileName = $this->replaceFile($this->licenseFile, 'delivery/drivers/licenses', $this->licenseFileName, 'LIC');

        } // end if





        // 1: replaceFile
        if ($this->licenseRearFile != $this->licenseRearFileName) {

            $this->licenseRearFileName = $this->replaceFile($this->licenseRearFile, 'delivery/drivers/licenses', $this->licenseRearFileName, 'LIC-R');

        } // end if









        // 1.2: updateLocally
        $driver = Driver::find($this->driver->id);

        $driver->licenseFile = $this->licenseFileName ?? null;
        $driver->licenseRearFile = $this->licenseRearFileName ?? null;

        $driver->save();






        $this->makeAlert('info', 'License has been updated');




    } // end function











    // ----------------------------------------------------------









    public function render()
    {



        return view('livewire.driver-portal.driver-profile');



    } // end function



} // end class

