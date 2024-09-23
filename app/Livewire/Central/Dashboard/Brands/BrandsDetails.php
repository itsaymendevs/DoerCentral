<?php

namespace App\Livewire\Central\Dashboard\Brands;

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







    public function update()
    {


        // 1: get instance
        $brand = ClientLead::find($this->instance->id);




        // 1.2: general
        $brand->name = $this->instance->name;
        $brand->email = $this->instance->email;
        $brand->country = $this->instance->country;
        $brand->users = $this->instance->users;
        $brand->address = $this->instance->address;
        $brand->websiteURL = $this->instance->websiteURL;

        $brand->phone = $this->instance->phone;
        $brand->landline = $this->instance->landline;



        // 1.2: contactPerson
        $brand->contactPerson = $this->instance->contactPerson;
        $brand->contactPersonPhone = $this->instance->contactPersonPhone;
        $brand->contactPersonWhatsapp = $this->instance->contactPersonWhatsapp;




        $brand->save();




        // 2: alert
        $this->makeAlert('success', 'Information has been updated');




    } // end function








    // -----------------------------------------------------------






    public function confirmRequest($id)
    {



        // 1: confirmationBox
        $this->temporaryId = $id;
        $this->makeAlert('question', 'Confirm request?', 'confirmRequest');



    } // end function





    // -----------------------------------------------------------






    #[On('confirmRequest')]
    public function confirm()
    {



        // 1: get instance
        $brand = ClientLead::find($this->temporaryId);

        $brand->status = 'processing';
        $brand->save();




        // 1.2: refresh - alert
        $this->makeAlert('success', 'Brand has been confirmed');

        $this->brand = ClientLead::find($brand->id);
        $this->render();


    } // end function







    // -----------------------------------------------------------








    public function render()
    {

        return view('livewire.central.dashboard.brands.brands-details');

    } // end function



} // end class
