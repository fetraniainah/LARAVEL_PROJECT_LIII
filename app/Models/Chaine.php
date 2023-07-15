<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chaine extends Model
{
    use HasFactory;

    protected $fillable  = ['name','image','type'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
