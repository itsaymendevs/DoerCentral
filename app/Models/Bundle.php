<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;




    public function module()
    {

        return $this->belongsTo(FeatureModule::class, 'featureModuleId');

    } // end function







    public function features()
    {

        return $this->hasMany(BundleFeature::class, 'bundleId');

    } // end function





    public function featuresInForm()
    {


        // 1: get instance
        $featuresInForm = [];
        $bundleFeatures = $this->features()?->get();



        // 1.2: loop - bundleFeatures
        foreach ($bundleFeatures ?? [] as $bundleFeature) {

            $featuresInForm[$bundleFeature?->featureId] = true;

        } // end loop





        return $featuresInForm ?? [];


    } // end function




} // end model



