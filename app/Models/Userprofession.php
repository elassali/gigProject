<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofession extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function profession(){
        return $this->belongsTo(Profession::class);
    }
    public function professions(){
        return $this->hasOne(Profession::class,'profession_id','id');
    }
}
