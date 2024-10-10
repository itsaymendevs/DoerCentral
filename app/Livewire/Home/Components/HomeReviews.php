<?php

namespace App\Livewire\Home\Components;

use Livewire\Component;

class HomeReviews extends Component
{
    public function render()
    {


        // 1: reviews
        $reviews = [];


        // 1.1: aleens
        $reviews[0]['name'] = 'Edward Abou Chaaya';
        $reviews[0]['position'] = "CEO";

        $reviews[0]['imageFile'] = 'aleens.png';
        $reviews[0]['videoURL'] = 'aleens.mp4';







        // 1.2: beHealthy
        $reviews[1]['name'] = 'Farouq Ahmadi';
        $reviews[1]['position'] = "General Manager";

        $reviews[1]['imageFile'] = 'behealthy.svg';
        $reviews[1]['videoURL'] = 'aleens.mp4';









        // 1.3: aleens
        $reviews[2]['name'] = 'Edward Abou Chaaya';
        $reviews[2]['position'] = "CEO";

        $reviews[2]['imageFile'] = 'healthybite.png';
        $reviews[2]['videoURL'] = 'aleens.mp4';







        // 1.4: beHealthy
        $reviews[3]['name'] = 'Farouq Ahmadi';
        $reviews[3]['position'] = "General Manager";

        $reviews[3]['imageFile'] = 'bemorehealthy.png';
        $reviews[3]['videoURL'] = 'aleens.mp4';





        // 1.5: aleens
        $reviews[4]['name'] = 'Edward Abou Chaaya';
        $reviews[4]['position'] = "CEO";

        $reviews[4]['imageFile'] = 'healthbar.svg';
        $reviews[4]['videoURL'] = 'aleens.mp4';





        return view('livewire.home.components.home-reviews', compact('reviews'));


    } // end function


} // end class
