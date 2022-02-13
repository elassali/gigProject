<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Offerdetail;
use Illuminate\Support\Carbon;

class OfferController extends Controller
{
    public function createnewoffre(Request $request){
        

        $user = Auth::user(); 
        $offer = new Offer;
        $offer->offer_status = $request['offer_privacy'];
        $offer->user_id = $user->id;
        $offer->save();
        // *==================
        $details = new Offerdetail();
        $details->offer_id = $offer->id;
        $details->profession_id = $request['profession_id'];
        $details->location_id = $request['city_id'];
        $details->description = $request['description'];
        $details->for_price = $request['price'];
        $details->for_date = Carbon::createFromFormat('Y-m-d\TH:i:s+',$request['job_date']);
        $details->expired_at =  Carbon::createFromFormat('Y-m-d\TH:i:s+',$request['expire_date']);
        $details->save();
        // * fetch profession for title
        $details->offer_title = "I Need A ".$details->profession->title;
        $details->save();

    }

    public function quickeditstatus(Request $request){
       $offer = Offer::findOrFail($request['offer_status']);
       $offer->offer_status = $offer->offer_status ? 0 : 1;
       $offer->save();
       return $offer;
    }

    // * Delete offre
    public function deleteoffer(Request $request){
        $id = $request['offer_id'];
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return $request['offer_id'];

    }
}
