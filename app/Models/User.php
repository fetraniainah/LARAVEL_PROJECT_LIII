<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Reagir;
use App\Models\Payment;
use App\Models\Comments;
use App\Models\Favories;
use App\Models\abonnement;
use App\Models\Notification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function favories()
    {
        return $this->hasMany(Favories::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function abonnements(){
        return $this->hasOne(abonnement::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function reagirs(){
        return $this->hasMany(Reagir::class);
    }

}
