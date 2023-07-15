<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Story;
use App\Models\Reagir;
use App\Models\Favories;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['chaine_id','titre','video_path','minuature_path','type','description','auteur'];

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function story(){
        return $this->hasMany(Story::class);
    }

    public function favories()
    {
        return $this->hasOne(Favories::class);
    }

    public function likes()
    {
        return $this->hasOne(Like::class);
    }

    public function reagirs(){
        return $this->hasMany(Reagir::class);
    }
}
