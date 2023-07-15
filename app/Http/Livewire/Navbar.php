<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\abonnement;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $notification=0;
    public $expired = 0;

    public function read(){
        return  Notification::where('user_id', Auth::user()->id)
           ->where('isRead', true)
           ->update(['isRead' => false]);
        
    }

    public function setTimeRemaining(){
        $modele = abonnement::where('user_id',Auth::user()->id)->first();
        $date = Carbon::parse($modele->expired); // Récupère la date existante
        // Calcul de la différence entre la date d'expiration et la date actuelle
        $secondsRemaining = strtotime($date) - time();
        $this->expired = floor($secondsRemaining / 86400);
    }




    public function render()
    {
          
        $this->notification = Notification::where('user_id', Auth::user()->id)
                                            ->where('isRead', true)
                                            ->sum('isRead');
        $this->setTimeRemaining();
        return view('livewire.navbar');
    }
}
