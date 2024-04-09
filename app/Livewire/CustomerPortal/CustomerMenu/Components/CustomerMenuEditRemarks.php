<?php

namespace App\Livewire\CustomerPortal\CustomerMenu\Components;

use App\Models\CustomerSubscriptionScheduleMeal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class CustomerMenuEditRemarks extends Component
{



    use HelperTrait;



    // :: variables
    public $remarks, $scheduleMeal;








    #[On('editRemarks')]
    public function remount($scheduleMealId)
    {



        // 1: get scheduleMeal - remarks
        $this->scheduleMeal = CustomerSubscriptionScheduleMeal::find($scheduleMealId);

        $this->remarks = $this->scheduleMeal->remarks;



    } // end function









    // -----------------------------------------------------------









    public function update()
    {





        // 1: create instance
        $instance = new stdClass();
        $instance->id = $this->scheduleMeal?->id;
        $instance->remarks = $this->remarks ?? null;





        // :: exists
        if ($instance->id) {




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/customers/menu/meals/remarks/update', $instance);




            // :: refresh / closeModal
            $this->remarks = '';
            $this->dispatch('closeModal', modal: '#meal-remarks .btn--close');



            // :: alert
            $this->makeAlert('success', $response->message);



        } // end if







    } // end function











    // -----------------------------------------------------------






    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-menu.components.customer-menu-edit-remarks');


    } // end function





} // end class
