<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public $videoId;
    public $content;

    protected function rules()
{
    return [
        'content' => ['required', 'string', 'max:1000'],
    ];
}





    public function addComment()
    {
        $this->validate();
        Comments::create([
            'user_id' => Auth::user()->id,
            'video_id'=>$this->videoId,
            'username' =>Auth::user()->name,
            'content' => $this->content,
        ]);

        return redirect('/play/'.$this->videoId);
    }
    public function render()
    {
        return view('livewire.comment',['comments'=>Video::find($this->videoId)->comments]);
    }
}
