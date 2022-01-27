<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'created_at' => 'datetime:d-F-Y',
    ];

    public function userprofession(){
        return $this->hasMany(Userprofession::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function tickets(){
        return $this->hasMAny(Ticket::class);
    }
    
    public function restrictions(){
        return $this->hasManny(Restrictedaccount::class);
    }

    public function restored(){
        return $this->hasMany(Restoredaccount::class);
    }
    public function report(){
        return $this->hasMany(Reportedaccount::class);
    }
    public function portfolio(){
        return $this->hasOne(Portfolio::class);
    }
   
}
