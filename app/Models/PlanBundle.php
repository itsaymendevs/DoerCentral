<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundle extends Model
{
    use HasFactory;




    public function plan()
    {

        return $this->belongsTo(Plan::class, foreignKey: 'planId');

    } // end function






    public function bundle()
    {

        return $this->belongsTo(Bundle::class, foreignKey: 'bundleId');

    } // end function




} // end model
