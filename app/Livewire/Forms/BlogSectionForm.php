<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogSectionForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $title, $content, $blogId;

    public $id, $sideImageFile, $bottomImageFile;




    // :: helpers
    public $sideImageFileName, $bottomImageFileName;




} // end form
