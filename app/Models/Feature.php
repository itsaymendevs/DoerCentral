<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;




    public function module()
    {

        return $this->belongsTo(FeatureModule::class, 'featureModuleId');

    } // end function



} // end model
