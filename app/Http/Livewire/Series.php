<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Series extends Component
{
    use WithPagination;
    public function render()
    {
        $series = Video::where('type','serie')->latest()->paginate(25);
        return view('livewire.series',['series'=>$series]);
    }
}
