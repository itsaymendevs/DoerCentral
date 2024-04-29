<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealInstructionTag extends Model
{
    use HasFactory;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function tag()
    {

        return $this->belongsTo(InstructionTag::class, 'instructionTagId');

    } // end function






} // end model
