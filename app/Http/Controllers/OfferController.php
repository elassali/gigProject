<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Offerdetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function getAllOffers(){
        $offers = DB::table('offers')
                    ->join('offerdetails','offers.id','=','offerdetails.offer_id')
                    ->join('professions','offerdetails.profession_id','=','professions.id')
                    ->join('cities','offerdetails.location_id','=','cities.id')
                    ->join('users','offers.user_id','=','users.id')
                    ->join('images',function($join){
                        $join->on('users.id','=','images.imageable_id')
                             ->where('images.imageable_type','=','App\Models\User');
                    })
                    ->select(DB::raw("CONCAT(users.name,' ',users.lastname) AS fullname"),
                    'users.id','offers.id','offers.created_at','offers.offer_status','images.url AS profilepicture',
                    'professions.title As profession','offerdetails.offer_title','offerdetails.description','cities.title As location' )
                    ->get();
        return $offers;
    }


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
        $id = $request['offer'];
        $offer = Offer::find($id);
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
    // * edit offer (only return offer data to display to the user in order if he wants to edit it)
    public function editoffer(Request $request){
        $id = $request['id'];
        $user = Auth::user();
        $offer = $user->offers->where('id',$id)->first();
        if($offer){
        $result = (object) array(
            'id' => $offer->id,
            'offer_status' => $offer->offer_status,
            'profession_name' => $offer->details->profession->title,
            'profession_id' => $offer->details->profession->id,
            'description' => $offer->details->description,
            'job_date' => $offer->details->for_date,
            'job_expire' =>$offer->details->expired_at,
            'offer_details_id' => $offer->details->id,
            'offer_title' => $offer->details->offer_title,
            'price' => $offer->details->for_price,
            'city' => $offer->details->city,   
        );
        }
        return $result;
    } 
    // * update offer and replace old info with new one
    public function updateoffer(Request $request){
        //  $request = $request['data.offer_id'];
        $user = Auth::user();
        $offer = $user->offers->where('id',$request['data.offer_id'])->first();
        if($offer){
            $offer->offer_status = $request['data.offer_privacy'];
            $offer->details->profession_id = $request['data.profession_id'] ;
            $offer->details->description = $request['data.description'];
            $offer->details->for_price = $request['data.price'];
            $offer->details->for_date = Carbon::createFromFormat('Y-m-d\TH:i:s+',$request['data.job_date']);
            $offer->details->expired_at = Carbon::createFromFormat('Y-m-d\TH:i:s+',$request['data.expire_date']);
            $offer->details->location_id = $request['data.city_id'];
            $offer->details->offer_title = $request['data.title'];
            $offer->details->save();
        }
        $offer->details->offer_title = "I Need A ".$offer->details->profession->title;
        $offer->details->save();
        $offer->save();
        return $offer;

    }
}
