<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $title, $subtitle, $author, $imageFile, $mobileImageFile, $headerImageFile;

    public $id, $publishDate, $summary, $isDarkMode, $isCenter;



    // :: relation
    public $tags = [];



    // :: helpers
    public $imageFileName, $mobileImageFileName, $headerImageFileName;




} // end form
