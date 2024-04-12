<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;



    public function ingredients()
    {

        return $this->hasMany(Ingredient::class, 'allergyId');

    } // end function


} // end model
