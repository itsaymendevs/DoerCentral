<?php

namespace App\Livewire\Home\Components;

use Livewire\Component;

class HomeAi extends Component
{
    public function render()
    {


        // 1: questions
        $questions = [];


        // 1.1: answer
        $questions[0]['question'] = 'Healthy Beef Burger Recipe?';
        $questions[0]['answer'] = "Here’s a healthy beef burger recipe that's nutritious, easy to make, and still packed with flavor!";
        $questions[0]['answerTwo'] = "For the Patties";







        return view('livewire.home.components.home-ai', compact('questions'));

    } // end function

} // end class
