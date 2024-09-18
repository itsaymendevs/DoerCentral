<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleFeature extends Model
{
    use HasFactory;


    public function bundle()
    {

        return $this->belongsTo(BundleFeature::class, 'bundleId');

    } // end function





    public function feature()
    {

        return $this->belongsTo(Feature::class, 'featureId');

    } // end function




} //end model
