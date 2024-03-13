<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    public function ranges()
    {

        return $this->hasMany(PlanRange::class, 'planId');

    } // end function




    public function bundles()
    {

        return $this->hasMany(PlanBundle::class, 'planId');

    } // end function




} // end model
