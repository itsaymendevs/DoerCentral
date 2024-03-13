<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleDay extends Model
{
    use HasFactory;



    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function


} // end model
