<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureModule extends Model
{
    use HasFactory;


    public function features()
    {

        return $this->hasMany(Feature::class, 'featureModuleId');

    } // end function



} // end model


