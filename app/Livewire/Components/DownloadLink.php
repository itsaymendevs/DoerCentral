<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DownloadLink extends Component
{


    use LivewireAlert;



    public $link;
    public $path;





    // -----------------------------------------------------------------------------------





    public function mount($path, $link)
    {

        $this->link = $link;
        $this->path = $path;

    } // end function





    // -----------------------------------------------------------------------------------





    public function download()
    {


        return Storage::disk('public')->download($this->path . '' . $this->link);

    } // end function









    // -----------------------------------------------------------------------------------




    public function render()
    {
        return view('livewire.components.download-link');

    } // end function




} // end class
