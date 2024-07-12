<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ActivityLogExport implements FromCollection, WithHeadings
{


    // :: variables
    public $logs;




    public function __construct($logs)
    {


        // :: handleParams
        $this->logs = $logs;



    } // end function








    // ------------------------------------------------------------------








    public function headings() : array
    {



        // 1: headings
        return ["No.", "User", "Module", "Action", "DateTime"];




    } // end headings











    // ------------------------------------------------------------------








    public function collection()
    {



        // :: combineRows - dependencies
        $combineRows = array();

        $counter = 1;






        // -----------------------------
        // -----------------------------








        // :: loop - logs
        foreach ($this->logs as $log) {






            // 1: create instance
            $content = new stdClass();



            // 1.2: SN
            $content->SN = $counter++;




            // 1.3: general
            $content->user = $log?->user?->name ?? $log?->name;
            $content->module = $log->module;
            $content->action = $log->description;
            $content->dateTime = date('d / m / Y', strtotime($log->dateTime));


            array_push($combineRows, $content);




        } // end loop  - deliveries












        // :: returnCombineRows
        return collect($combineRows);



    } // end function











    // -------------------------------------------------------------











} // end class
