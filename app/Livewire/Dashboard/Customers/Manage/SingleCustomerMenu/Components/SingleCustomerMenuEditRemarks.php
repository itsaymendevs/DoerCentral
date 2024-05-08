<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerMenu\Components;

use App\Models\CustomerSubscriptionScheduleMeal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class SingleCustomerMenuEditRemarks extends Component
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



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







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




        return view('livewire.dashboard.customers.manage.single-customer-menu.components.single-customer-menu-edit-remarks');


    } // end function





} // end class
