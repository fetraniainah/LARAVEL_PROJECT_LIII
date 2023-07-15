<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public function fee(){
        return 10000;
    }

    public function render()
    {
        $fees = $this->fee();
        return view('livewire.card',['fee'=>$fees]);
    }
}
