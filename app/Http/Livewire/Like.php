<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Comments;
use App\Models\Favories;
use App\Models\Reagir;
use Illuminate\Support\Facades\Auth;

class Like extends Component
{
    public $count = 0;
    public $videoId; 
    
   

    public function setLike(){
        return Reagir::where('video_id', $this->videoId)
        ->where('isLiked', true)
        ->sum('isLiked');
    }

    public function increment(){
        $user = Reagir::where('user_id',Auth::user()->id)->where('video_id',$this->videoId)->first();
        if($user != null){
            if($user->isLiked==true){
                Reagir::where('user_id', Auth::user()->id)
                ->where('isLiked', true)
                ->update(['isLiked' => false]);
            }else{
                Reagir::where('user_id', Auth::user()->id)
                ->where('isLiked', false)
                ->update(['isLiked' => true]);
            }
            
        }else{
            Reagir::create([
                'user_id'=>Auth::user()->id,
                'video_id'=>$this->videoId
            ]);
        }
        return redirect('/play/'.$this->videoId);
    }

    public function addFavoris(){
        $res = Favories::where('video_id',$this->videoId)->where('user_id',Auth::user()->id)->get();
        if($res->count() >0){
            return redirect('/play/'.$this->videoId)->with('success','Cette vidéo existe deja dans vos listes de favoris !');
        }else{
            Favories::create([
                'user_id'=>Auth::user()->id,
                'video_id'=>$this->videoId
            ]);
            return redirect('/play/'.$this->videoId)->with('success','Vidéo ajouté !');
        }
        
    }

    public function render()
    {$this->count = $this->setLike();
        return view('livewire.like',['countComment'=>Comments::where('video_id',$this->videoId)->count()]);
    }
}
