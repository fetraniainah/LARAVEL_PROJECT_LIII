<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class TeleRealite extends Component
{
    use WithPagination;
    public function render()
    {
        $show = Video::where('type','tele-realite')->latest()->paginate(25);
        return view('livewire.tele-realite',['show'=>$show]);
    }
}
