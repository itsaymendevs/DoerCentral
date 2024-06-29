<?php

namespace App\Livewire\Dashboard\Stock\Stock;

use App\Models\Container;
use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseContainer;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StockContainers extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchItem = '';








    #[On('refreshStock')]
    public function render()
    {



        // 1: dependencies
        $itemsList = Container::where('name', 'LIKE', '%' . $this->searchItem . '%')
                ?->get()?->pluck('id')?->toArray() ?? [];







        // 1.2: stockPurchases => stockItems
        $stockPurchases = StockItemPurchase::where('isConfirmed', true)->get()?->pluck('id')?->toArray() ?? [];
        $stockItems = StockItemPurchaseContainer::whereIn('stockItemPurchaseId', $stockPurchases)
            ->whereIn('containerId', $itemsList)->get();






        return view('livewire.dashboard.stock.stock.stock-containers', compact('stockItems'));




    } // end function


} // end class
