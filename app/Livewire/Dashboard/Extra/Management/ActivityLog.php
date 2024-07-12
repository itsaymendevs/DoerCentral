<?php

namespace App\Livewire\Dashboard\Extra\Management;

use App\Exports\ActivityLogExport;
use App\Models\User;
use App\Traits\HelperTrait;
use Livewire\Component;
use App\Models\ActivityLog as Log;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;




class ActivityLog extends Component
{

    use HelperTrait;
    use WithPagination;


    // :: variables
    public $searchUser, $searchDescription = '';









    // -----------------------------------------------------------







    public function export()
    {




        // 1: prepareExportData
        $users = User::where('email', '!=', 'tech@doer.ae')->get();




        $logs = Log::orderBy('id', 'desc')
            ->whereIn('userId', $this->searchUser ? [$this->searchUser] : $users?->pluck('id')?->toArray() ?? [])
            ->where('description', 'LIKE', '%' . $this->searchDescription . '%')
            ->get();








        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($logs->count() > 0) {


            return Excel::download(new ActivityLogExport($logs), 'activity-log.xlsx');



            // :: no-logs
        } else {



            $this->makeAlert('info', 'Logs is empty');


        } // end if







    } // end function







    // -----------------------------------------------------------









    public function render()
    {





        // 1: dependencies
        $users = User::where('email', '!=', 'tech@doer.ae')->get();




        $logs = Log::orderBy('id', 'desc')
            ->whereIn('userId', $this->searchUser ? [$this->searchUser] : $users?->pluck('id')?->toArray() ?? [])
            ->where('description', 'LIKE', '%' . $this->searchDescription . '%')
            ->paginate(200);




        return view('livewire.dashboard.extra.management.activity-log', compact('logs', 'users'));




    } // end function



} // end class
