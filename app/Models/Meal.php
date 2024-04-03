<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;



    public function tags()
    {

        return $this->hasMany(MealTag::class, 'mealId');

    } // end function





    public function instructions()
    {

        return $this->hasMany(MealInstruction::class, 'mealId');

    } // end function





    public function sizes()
    {

        return $this->hasMany(MealSize::class, 'mealId');

    } // end function





    public function diet()
    {

        return $this->belongsTo(Diet::class, 'dietId');

    } // end function





    public function type()
    {

        return $this->belongsTo(Type::class, 'typeId');

    } // end function






    public function types()
    {

        return $this->hasMany(MealAvailableType::class, 'mealId');

    } // end function







    public function typesInArray()
    {


        // 1: getTypes - loop
        $typesInArray = [];
        $availableTypes = $this->types()->get();



        foreach ($availableTypes as $availableType) {

            array_push($typesInArray, $availableType->mealType->name);

        } // end loop


        return $typesInArray ? $typesInArray : ['Not Assigned'];


    } // end function














    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------







    public function ingredients()
    {

        return $this->hasMany(MealIngredient::class, 'mealId');

    } // end function







    public function parts()
    {

        return $this->hasMany(MealPart::class, 'mealId');

    } // end function













    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------









    public function totalGrams()
    {


        // :: root
        $totalGrams = 0;



        // 1: getTotalPartGrams
        $totalGrams += $this?->ingredients?->sum('amount') ?? 0;
        $totalGrams += $this?->parts?->sum('amount') ?? 0;



        return $totalGrams;


    } // end function












    // ------------------------------------------










    public function partsInArray()
    {


        // :: parts
        $parts = [];



        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get();

        foreach ($mealIngredients?->unique('mealId') as $mealIngredient)
            $mealIngredient?->ingredient ? array_push($parts, $mealIngredient->ingredient->name) : null;






        // 2: parts
        $mealParts = $this->parts()?->get();

        foreach ($mealParts?->unique('mealId') as $mealPart)
            $mealPart?->part ? array_push($parts, $mealPart->part->name) : null;






        return count($parts) > 0 ? $parts : ['List is empty'];



    } // end function













    // ------------------------------------------










    public function allergiesAndExcludesInArray($allergies = [], $excludes = [])
    {




        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get() ?? [];



        foreach ($mealIngredients as $mealIngredient) {

            if ($mealIngredient->ingredient && $mealIngredient->ingredient->excludeId)
                array_push($excludes, $mealIngredient->ingredient->excludeId);


            if ($mealIngredient->ingredient && $mealIngredient->ingredient->allergyId)
                array_push($allergies, $mealIngredient->ingredient->allergyId);

        }  // end loop







        // -----------------------------------------
        // -----------------------------------------







        // 2: parts
        $mealParts = $this->parts()?->get() ?? [];


        foreach ($mealParts as $mealPart) {


            // :: recursion
            $combinedArray = $mealPart->part->allergiesAndExcludesInArray($allergies, $excludes);



            // :: merge
            $excludes = array_merge($excludes, $combinedArray['excludes']);
            $allergies = array_merge($allergies, $combinedArray['allergies']);


        } // end loop











        return ['allergies' => array_unique($allergies ?? []),
            'excludes' => array_unique($excludes ?? [])];




    } // end function







} // end model
