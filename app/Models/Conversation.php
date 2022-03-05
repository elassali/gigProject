<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function correspondent(){
        return $this->hasOne(User::class,'id','sender');
    }
    public function messages(){
        return $this->hasMany(Message::class,'conversation_id','id');
    }
    public function receiver(){
        return $this->hasOne(User::class,'id','recipent');
    }
}
