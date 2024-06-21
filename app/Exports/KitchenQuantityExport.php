<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;


class KitchenQuantityExport implements FromCollection, WithHeadings
{



    // :: variables
    public $ingredients, $parts, $unit, $partsWithGrams, $ingredientsWithGrams;




    public function __construct($parts, $ingredients, $partsWithGrams, $ingredientsWithGrams, $unit)
    {


        // :: handleParams
        $this->unit = $unit;
        $this->parts = $parts;
        $this->ingredients = $ingredients;
        $this->partsWithGrams = $partsWithGrams;
        $this->ingredientsWithGrams = $ingredientsWithGrams;



    } // end function








    // ------------------------------------------------------------------








    public function headings() : array
    {

        return [
            "Name",
            "Type",
            "Amount",
        ];


    } // end headings











    // ------------------------------------------------------------------








    public function collection()
    {



        // :: combineRows
        $combineRows = array();




        // -----------------------------
        // -----------------------------







        //  A: loop - parts
        foreach ($this->parts ?? [] as $part) {




            // :: create instance
            $content = new stdClass();








            // 1: name - type
            $content->name = $part?->name;
            $content->type = $part?->type?->name;





            // 1.2: amount
            if ($this->unit == 1) {

                $content->amount = number_format($this->partsWithGrams[$part->id] / $this->unit) . ' (G)';

            } else {

                $content->amount = number_format($this->partsWithGrams[$part->id] / $this->unit, 2) . ' (KG)';

            } // end if









            // 2: append
            array_push($combineRows, $content);




        } // end loop - parts








        // ------------------------------------------------------------
        // ------------------------------------------------------------








        // B: ingredients
        foreach ($this->ingredients ?? [] as $ingredient) {




            // :: create instance
            $content = new stdClass();








            // 2: name - type
            $content->name = $ingredient?->name;
            $content->type = "Ingredient";





            // 2.2: amount
            if ($this->unit == 1) {

                $content->amount = number_format($this->ingredientsWithGrams[$ingredient->id] / $this->unit) . ' (G)';

            } else {

                $content->amount = number_format($this->ingredientsWithGrams[$ingredient->id] / $this->unit, 2) . ' (KG)';

            } // end if









            // 2: append
            array_push($combineRows, $content);




        } // end loop - ingredients










        // :: returnCombineRows
        return collect($combineRows);



    } // end function








} // end class
