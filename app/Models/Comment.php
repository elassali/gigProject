<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];

    public function user(){
        return $this->morphTo(__FUNCTION__,'commentable_type','commentable_id');
    }
    
    // ? relation to get replies for this comment
    public function replies(){
        return $this->hasMany(Reply::class,'comment_id','id');
    }



}
