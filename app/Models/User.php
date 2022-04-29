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
        'username',
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
        'date_of_birth' => 'datetime:d-F-Y'
    ];
 
    public function userprofession(){ 
        return $this->belongsToMany(Profession::class,'userprofessions')->withPivot('experience');  
    } 

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function image(){ 
        return $this->morphOne(Image::class,'imageable');
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
        return $this->hasMany(Reportedaccount::class,'reporter_user_id','id');
    }
    public function portfolio(){
        return $this->hasMany(Portfolio::class);
    }
    public function getFullNameAttribute() {

        return ucfirst($this->name) . ' ' . ucfirst($this->lastname);
    }
    public function replies(){
        return $this->hasMany(Reply::class,'user_id','id');
    }
    public function city(){
        return $this->hasOne('title','city');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'user_roles');
    }
    // * get user conversation
    public function conversations(){
        return $this->hasMany(Conversation::class,'recipent','id');
    }
        
       
   
}
