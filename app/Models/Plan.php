<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;





    public function bundles()
    {

        return $this->hasMany(PlanBundle::class, foreignKey: 'planId');

    } // end function







    public function bundlesInArray()
    {


        // 1: getBundles - IDs
        $bundlesIDs = $this->bundles()?->get()?->pluck(value: 'bundleId')?->toArray() ?? [];


        // 1.2: bundles
        $bundles = Bundle::whereIn(column: 'id', values: $bundlesIDs)?->pluck('name')?->toArray() ?? [];

        return $bundles;



    } // end function










    public function bundlesInForm()
    {


        // 1: getBundles - IDs
        $bundlesIDs = $this->bundles()?->get()?->pluck(value: 'bundleId')?->toArray() ?? [];





        // 1.2: bundlesInForm
        $bundles = Bundle::whereIn(column: 'id', values: $bundlesIDs)?->get();

        $bundlesInForm = [];

        foreach ($bundles ?? [] as $bundle) {

            $bundlesInForm[$bundle->featureModuleId] = $bundle->id;

        } // end loop





        return $bundlesInForm;



    } // end function





} // end model
