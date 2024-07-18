<?php

namespace App\Jobs;

use App\Traits\MenuCalendarTrait;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ReAssignScheduleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;





    // 1: traits
    use MenuCalendarTrait;



    // 2: parameters
    public $tried = 3;
    public $calendarSchedule;







    public function __construct($calendarSchedule)
    {



        // 1: getParams
        $this->calendarSchedule = $calendarSchedule;


    } // endConstructor









    // -------------------------------------------------------------------------







    public function handle() : void
    {



        // 1: callReAssignSchedule
        $this->reAssignSchedule($this->calendarSchedule);


    } // end function









    // -------------------------------------------------------------------------





    public function failed(Throwable $event)
    {


        // 1: logInfo
        info('Re-assign schedule Job has failed' . $event->getMessage());


    } // end function







} // endClass
