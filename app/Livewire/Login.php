<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;


#[Layout('livewire.layouts.login')]
class Login extends Component
{

   use LivewireAlert;
   use HelperTrait;


   // :: variables
   public $email, $password;




   public function checkUser()
   {



      // 1: checkUser
      $user = User::where('email', $this->email)->first();




      // 1.2: checkValidity - token
      if ($user && Hash::check($this->password, $user->password)) {




         // 1.2.5: checkInactive
         if (! $user->isActive) {

            $this->makeAlert('error', "Account Restricted");
            return false;

         } // end if





         // 1.2.6: makeSessions
         $token = $user->createToken('user', ['role:user'])->plainTextToken;

         Session::put('token', $token);
         Session::put('userId', $user->id);
         Session::put('userName', $user->name);
         Session::put('globalUser', $user);




         return $this->redirect(route('dashboard.brands'), navigate: false);


      } // end if







      // 1.3: un-authorized
      $this->makeAlert('error', "Incorrect Credentials");





   } // end function







   // ------------------------------------------------------








   public function render()
   {



      // :: removeSessions
      Session::forget(['token', 'userId', 'userName', 'globalUser']);


      $this->dispatch('initTooltips');

      return view('livewire.login');

   } // end function







} // end class
