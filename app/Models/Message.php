<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'id','belongsto');
    }
    public function conversation(){
        return $this->hasOne(Conversation::class,'id','conversation_id');
    }
}
