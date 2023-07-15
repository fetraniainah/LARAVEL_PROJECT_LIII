<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Anime extends Component
{
    use WithPagination;
    public function render()
    {
        $anime = Video::where('type','anime')->latest()->paginate(25);

        return view('livewire.anime',['anime'=>$anime]);
    }
}
