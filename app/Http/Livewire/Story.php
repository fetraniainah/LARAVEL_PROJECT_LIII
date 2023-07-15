<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Story extends Component
{
    public function render()
    {
        $film = Video::all();
        return view('livewire.story',['film'=>$film]);
    }
}
