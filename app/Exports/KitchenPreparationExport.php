<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class KitchenPreparationExport implements FromCollection, WithHeadings
{

    // :: variables
    public $ingredients, $unit, $ingredientsWithGrams;




    public function __construct($ingredients, $ingredientsWithGrams, $unit)
    {


        // :: handleParams
        $this->unit = $unit;
        $this->ingredients = $ingredients;
        $this->ingredientsWithGrams = $ingredientsWithGrams;



    } // end function








    // ------------------------------------------------------------------








    public function headings() : array
    {

        return [
            "Name",
            "Category",
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







        //  :: loop - ingredients
        foreach ($this->ingredients ?? [] as $ingredient) {




            // :: create instance
            $content = new stdClass();








            // 1: name - category
            $content->name = $ingredient?->name;
            $content->category = $ingredient?->category?->name;





            // 1.2: amount
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
