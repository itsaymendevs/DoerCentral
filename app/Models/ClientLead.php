<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLead extends Model
{
    use HasFactory;



    public function plan()
    {

        return $this->belongsTo(Plan::class, foreignKey: 'planId');

    } // end function







    public function featuresInArray()
    {


        // 1: get features
        $nameURLs = explode(',', $this->features);

        $features = Feature::whereIn('nameURL', $nameURLs ?? [])?->pluck('name')?->toArray() ?? [];


        return $features ?? [];


    } // end function








} // end model
