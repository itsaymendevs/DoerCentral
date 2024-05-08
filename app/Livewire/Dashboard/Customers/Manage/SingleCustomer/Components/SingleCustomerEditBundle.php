<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomer\Components;

use App\Models\CustomerSubscription;
use App\Models\MealType;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class SingleCustomerEditBundle extends Component
{


    use HelperTrait;



    // :: variables
    public $latestSubscription;
    public $currentBundleTypes = [], $requiredTypes = [];








    public function mount($id)
    {



        // 1: get instance
        $this->latestSubscription = CustomerSubscription::find($id);





        // 1.2: get requiredTypes
        foreach ($this->latestSubscription->types->groupBy('typeId') as $commonType => $latestSubscriptionTypes)
            $this->requiredTypes[$commonType] = $latestSubscriptionTypes->sum('quantity');





        // 1.3: setMealTypes
        foreach ($this->latestSubscription->types as $type)
            $this->currentBundleTypes[$type->mealTypeId] = $type->quantity;




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









        // 1: validate requiredTypes with currentBundleTypes
        $types = Type::all();

        foreach ($types as $type) {



            // :: typeExists
            if (! empty($this->requiredTypes[$type->id])) {




                // 1.2: getTypeCount
                $typeCount = 0;

                foreach ($type->mealTypes as $mealType)
                    $typeCount += $this->currentBundleTypes[$mealType->id];





                // 1.3: compareRequiredTypes
                if ($typeCount != $this->requiredTypes[$type->id]) {

                    $this->makeAlert('info', "Please select the correct number of {$type->name} to continue");

                    return false;

                } // end if


            } // end if

        } // end loop











        // --------------------------
        // --------------------------







        // :: continue



        // 2: make instance
        $instance = new stdClass();

        $instance->latestSubscriptionId = $this->latestSubscription->id;
        $instance->bundleTypes = $this->currentBundleTypes;






        // 2.1: makeRequest
        $response = $this->makeRequest('dashboard/customers/bundle/types/update', $instance);




        // :: resetForm - resetFilePreview
        $this->dispatch('closeModal', modal: '#edit-bundle .btn--close');
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();
        $types = Type::whereIn('name', ['Recipe', 'Side', 'Snack', 'Drink'])->get();









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer.components.single-customer-edit-bundle', compact('mealTypes', 'types'));



    } // end function






} // end class
