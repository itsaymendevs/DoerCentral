<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $title, $subtitle, $author, $imageFile, $headerImageFile;

    public $id, $publishDate;



    // :: relation
    public $tags = [];



    // :: helpers
    public $imageFileName, $headerImageFileName;




} // end form
