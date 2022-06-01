<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    public function getalloffers(){
        $offers = DB::table('offers')
                    ->join('offerdetails','offers.id','=','offerdetails.offer_id')
                    ->join('users','offers.user_id','=','users.id')
                    ->join('images',function($join){
                        $join->on('users.id','=','images.imageable_id')
                             ->where('images.imageable_type','=','App\Models\User');
                    })
                    ->select(DB::raw("CONCAT(users.name,' ',users.lastname) AS fullname"),'users.id','offers.id','offers.created_at','offers.offer_status','images.url AS profilepicture' )
                    ->get();
        return $offers;                    
        // 
    }
}
