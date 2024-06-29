<?php

namespace App\Livewire\Dashboard\Stock\Stock;

use App\Models\Label;
use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseLabel;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StockLabels extends Component
{



    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchItem = '';








    #[On('refreshStock')]
    public function render()
    {



        // 1: dependencies
        $itemsList = Label::where('name', 'LIKE', '%' . $this->searchItem . '%')
                ?->get()?->pluck('id')?->toArray() ?? [];







        // 1.2: stockPurchases => stockItems
        $stockPurchases = StockItemPurchase::where('isConfirmed', true)->get()?->pluck('id')?->toArray() ?? [];
        $stockItems = StockItemPurchaseLabel::whereIn('stockItemPurchaseId', $stockPurchases)
            ->whereIn('labelId', $itemsList)->get();






        return view('livewire.dashboard.stock.stock.stock-labels', compact('stockItems'));




    } // end function


} // end class
