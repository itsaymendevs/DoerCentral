<?php

namespace App\Livewire\Dashboard\Brands;

use App\Livewire\Forms\ClientLeadForm;
use App\Models\ClientLead;
use App\Traits\HelperTrait;
use Livewire\Component;

class BrandsLicense extends Component
{


    use HelperTrait;




    // :: variables
    public $brand;
    public ClientLeadForm $instance;




    public function mount($id)
    {


        // 1: get instance
        $this->brand = ClientLead::find($id);




        // :: initiate
        foreach ($this->brand->toArray() as $key => $value)
            $this->instance->{$key} = $value;








    } // end function







    // -----------------------------------------------------------








    public function render()
    {

        return view('livewire.dashboard.brands.brands-license');

    } // end function



} // end class
