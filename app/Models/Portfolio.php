<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function feedback(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profession(){
        return $this->hasOne(Profession::class,'id','profession_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'portfolio_id','id');
    }
}
