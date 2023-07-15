<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mobile extends Component
{

    public function fee(){
        return 10000;
    }

    
    public function render()
    {
        $fees = $this->fee();
        
        return view('livewire.mobile',['fee'=>$fees]);
    }
}