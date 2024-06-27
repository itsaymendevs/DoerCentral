<?php

namespace App\Livewire\Dashboard\Inventory\PurchaseOrders\Components;

use App\Livewire\Forms\PurchaseOrderCartForm;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PurchaseOrdersCart extends Component
{



    use HelperTrait;



    // :: variables
    public $instance = [];
    public $ingredientsWithGrams, $unit;









    #[On('confirmPurchase')]
    public function remount($cart = [], $ingredientsWithGrams, $unit)
    {



        // 1: dependencies
        $this->instance = [];
        $this->unit = $unit;
        $this->ingredientsWithGrams = $ingredientsWithGrams;

        $ingredients = array_column($cart, 'ingredientId');
        $suppliers = array_column($cart, 'supplierId');






        // --------------------------------------
        // --------------------------------------






        // 2: get instance
        $supplierIngredients = SupplierIngredient::whereIn('supplierId', $suppliers)
                ?->whereIn('ingredientId', $ingredients)?->get();





        // 2.1: outer loop - supplierIngredients
        foreach ($supplierIngredients ?? [] as $outerKey => $supplierIngredient) {


            foreach ($supplierIngredient?->toArray() ?? [] as $key => $value)
                $this->instance[$outerKey][$key] = $value;




            // 2.3: extra
            $this->instance[$outerKey]['extraAmount'] = 0;
            $this->instance[$outerKey]['supplier'] = $supplierIngredient->supplier->name;
            $this->instance[$outerKey]['ingredient'] = $supplierIngredient->ingredient->name;
            $this->instance[$outerKey]['totalSellPrice'] = number_format(($supplierIngredient?->sellPrice ?? 0) * ($ingredientsWithGrams[$supplierIngredient->ingredient->id] / $unit), 1);



        } // end loop





    } // end function








    // -----------------------------------------------------------







    public function store()
    {





        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchase-orders/store', $this->instance);






        // :: reset
        $this->instance = [];
        $this->dispatch('closeModal', modal: '#purchase-cart .btn--close');

        $this->makeAlert('success', $response?->message);








    } // end function









    // -----------------------------------------------------------






    public function updateAmount($key)
    {



        if ($this->instance[$key]['extraAmount']) {


            // 1: updatePrice
            $this->instance[$key]['totalSellPrice'] = ($this->instance[$key]['sellPrice'] ?? 0) *
                ($this->ingredientsWithGrams[$this->instance[$key]['ingredientId']] / $this->unit);



            $this->instance[$key]['totalSellPrice'] = number_format(($this->instance[$key]['totalSellPrice'] ?? 0) +
                ($this->instance[$key]['totalSellPrice'] ?? 0) * (($this->instance[$key]['extraAmount'] ?? 0) / 100), 2);


        } // end if




    } // end function






    // -----------------------------------------------------------









    public function render()
    {


        return view('livewire.dashboard.inventory.purchase-orders.components.purchase-orders-cart');


    } // end function







} // end class
