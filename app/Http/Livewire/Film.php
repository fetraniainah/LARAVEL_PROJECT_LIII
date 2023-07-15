<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Film extends Component
{
    use WithPagination;

    public function render()
    {
        $film = Video::where('type','film')->latest()->paginate(25);
        return view('livewire.film',['film'=>$film]);
    }
}
