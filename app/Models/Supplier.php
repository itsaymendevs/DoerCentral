<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;


    public function ingredients()
    {
        return $this->hasMany(SupplierIngredient::class, 'supplierId');

    } // end function



} // end model
