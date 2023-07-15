<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','username','video_id','content'];


public function user(){
    return $this->belongsTo(User::class);
}

public function video(){
    return $this->belongsTo(Video::class);
}
}
