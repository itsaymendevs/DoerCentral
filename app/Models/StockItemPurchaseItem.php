<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItemPurchaseItem extends Model
{
    use HasFactory;





    public function item()
    {
        return $this->belongsTo(Item::class, 'itemId');

    } // end function




    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId');

    } // end function






    public function stockPurchase()
    {
        return $this->belongsTo(StockItemPurchase::class, 'stockItemPurchaseId');

    } // end function




} // end model
