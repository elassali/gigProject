<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerdetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts=[
        'for_date' => 'datetime:d-F-Y',
        'expired_at' => 'datetime:d-F-Y'
    ];


    public function offer(){
        return $this->belongsTo(Offer::class);
    }
    public function profession(){
        return $this->hasOne(Profession::class,'id','profession_id'); 
    }
    public function city(){
        return $this->hasOne(City::class,'id','location_id');
    }
    
}
