<?php

namespace App\Livewire\Central\Dashboard\Tech\Brands;

use App\Livewire\Forms\ClientLeadForm;
use App\Models\ClientLead;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class BrandsDetails extends Component
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






    public function activateBrand($id)
    {



        // 1: confirmationBox
        $this->temporaryId = $id;
        $this->makeAlert('question', 'Activate client?', 'activateBrand');



    } // end function





    // -----------------------------------------------------------






    #[On('activateBrand')]
    public function activate()
    {



        // 1: get instance
        $brand = ClientLead::find($this->temporaryId);

        $brand->status = 'active';
        $brand->save();




        // 1.2: refresh - alert
        $this->makeAlert('success', 'Brand has been activated');

        $this->brand = ClientLead::find($brand->id);
        $this->render();


    } // end function







    // -----------------------------------------------------------








    public function render()
    {

        return view('livewire.central.dashboard.tech.brands.brands-details');

    } // end function



} // end class
