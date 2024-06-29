<?php

namespace App\Livewire\Dashboard\Stock\Stock;

use App\Models\Item;
use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseItem;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StockItems extends Component
{



    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchItem = '';








    #[On('refreshStock')]
    public function render()
    {



        // 1: dependencies
        $itemsList = Item::where('name', 'LIKE', '%' . $this->searchItem . '%')
                ?->get()?->pluck('id')?->toArray() ?? [];







        // 1.2: stockPurchases => stockItems
        $stockPurchases = StockItemPurchase::where('isConfirmed', true)->get()?->pluck('id')?->toArray() ?? [];
        $stockItems = StockItemPurchaseItem::whereIn('stockItemPurchaseId', $stockPurchases)
            ->whereIn('itemId', $itemsList)->get();






        return view('livewire.dashboard.stock.stock.stock-items', compact('stockItems'));




    } // end function


} // end class
