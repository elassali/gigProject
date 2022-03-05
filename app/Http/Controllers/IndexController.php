<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\City;
use App\Models\Reportedaccount;
use Symfony\Component\HttpFoundation\Response;
class IndexController extends Controller
{
   // ? Profile data for wanted user
   public function profile(Request $request){
      $username = $request['username'];
      $user = User::where('username',$username)->first();
      $userdata = [];
      $userportfolio = [];
      $i = 0;
      if($user){
         foreach($user->portfolio as $item){ 
            $userportfolio[$i] = (object) array(
               'id' => $item->id,
               'title' => $item->profession->title,
               'comments_count' => $item->comments->count(),
               'reviews_avg' => number_format($item->comments->avg('review_score'),1,'.',''), // number_format($num, 2, '.', '') /
               'images' => $item->images->map(function($galery){
                  return array( 'url' => $galery->url );
               })
           );
           $i++;
         }
       
         $userdata = (object) array(
            'id' => $user->id,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'city' => $user->city,
            'professions' => $user->userprofession,
            'portfolio' => $userportfolio,
            'about' => $user->about,
            'image' => $user->image ? $user->image->url : 'There is no image to show',
         );


      }
   
      return $userdata;
        
   }
   // ? get galery images
   public function getgalery(Request $request){
      $username = $request['username'];
      $profession_id = $request['profession'];
      $user = User::where('username',$username)->first();
      $images = [];
      if($user){
         $portfolio = $user->portfolio->where('profession_id',$profession_id);
         foreach($portfolio as $item){
            $images = (object) array(
               'url' => $item->url
            );
         }
      }
      return $images; 
   }

   // * ============== Report ================
   public function newReport(Request $request){
      $user = Auth::user();
      if($user){
         $reasons = [ 0 => 'an apropriate profile',1 => 'Fake profile', 2 => 'Identity thief'];
         $reported_user = User::where('username',$request['username'])->first();
         if($reported_user){
            $pastreport = $user->report->where('reported_user_id',$reported_user->id)->first();
            if(!$pastreport){
               if(array_key_exists($request['reason'],$reasons)){
                  $report = new Reportedaccount();
                  $report->reporter_user_id = $user->id;
                  $report->reported_user_id = $reported_user->id;
                  $report->reason = $reasons[$request['reason']];
                  $report->save();
                  return response(['status'=>Response::HTTP_CREATED]);
                  }
            }
            else {
               return response(['status'=>Response::HTTP_ALREADY_REPORTED]);
            }
         }
         else{
            return response(['status'=>Response::HTTP_BAD_REQUEST]);
         }
         
      }
      else{
         return response(['status'=>Response::HTTP_UNAUTHORIZED]);
      }
     
   }

   public function checkreport(Request $request){
      $user = Auth::user();
      if($user){
         $reported_user = User::where('username',$request['username'])->first();
         if($reported_user){
            $pastreport = $user->report->where('reported_user_id',$reported_user->id)->first();
            if($pastreport){         
               return response(['status'=>Response::HTTP_ALREADY_REPORTED]);      
            }
            else{
               return response(['status'=>Response::HTTP_ACCEPTED]);
            }
       
         }
       
         
      }
      else{
         return response(['status'=>Response::HTTP_UNAUTHORIZED]);
      }
      
   }

   //* ================== report ========================








   // ? get talents
   public function talents(){
      $users = User::has('portfolio')->get();
      $response = [];
      $i = 0;
      foreach($users as $user){
         $response[$i] = array( 
            'full_name' => $user->full_name,
            'username' => $user->username,
            'profession' => $user->portfolio->first()->profession->title,
            'review_score' => number_format($user->portfolio->first()->comments->avg('review_score'),1,'.',''),
            'is_verified' => $user->identity_verified_at ? 1 : 0,
            'comments_count' => $user->portfolio->first()->comments->count()                                                                                  
         );
         $i++;
      }
      return $response; 
   }
// ! ===============================================================================================>

   public function filtertalents(Request $request){
      $response = [];
      $i = 0;
       // * specefic profession by city and  verified 
      if($request['profession'] && $request['city'] && $request['verfied']){
         $portfolios = Portfolio::where('profession_id',7)->get();
         $city = City::find($request['city']);
         if($city && $portfolios){
            foreach($portfolios as $portfolio){
               if($portfolio->user->city == $city->title && $portfolio->user->identity_verified_at){
                  $response[$i] = array( 
                     'full_name' => $portfolio->user->full_name,
                     'username' => $portfolio->user->username,
                     'profession' => $portfolio->profession->title,
                     'review_score' => number_format($portfolio->comments->avg('review_score'),1,'.',''),
                     'is_verified' => $portfolio->user->identity_verified_at ? 1 : 0,
                     'comments_count' => $portfolio->comments->count(),
                     'city' => $portfolio->user->city                                                                                  
                  );
                  $i++;
               }
          
              
            }
         } 
      }
      // * specefic profession by city and not verified 
      if($request['profession'] && $request['city'] && $request['verfied'] == "false"){
         $portfolios = Portfolio::where('profession_id',7)->get();
         $city = City::find($request['city']);
         if($city && $portfolios){
            foreach($portfolios as $portfolio){
               if($portfolio->user->city == $city->title){
                  $response[$i] = array( 
                     'full_name' => $portfolio->user->full_name,
                     'username' => $portfolio->user->username,
                     'profession' => $portfolio->profession->title,
                     'review_score' => number_format($portfolio->comments->avg('review_score'),1,'.',''),
                     'is_verified' => $portfolio->user->identity_verified_at ? 1 : 0,
                     'comments_count' => $portfolio->comments->count(),
                     'city' => $portfolio->user->city                                                                                  
                  );
                  $i++;
               }
          
              
            }
         } 
      }
     // * all professions by Profession
      if($request['profession'] && !$request['city'] && $request['verfied'] == "false"){
         $portfolios = Portfolio::where('profession_id',$request['profession'])->get();
         foreach($portfolios as $portfolio){
            $response[$i] = array( 
               'full_name' => $portfolio->user->full_name,
               'username' => $portfolio->user->username,
               'profession' => $portfolio->profession->title,false,    
               'review_score' => number_format($portfolio->first()->comments->avg('review_score'),1,'.',''),
               'is_verified' => $portfolio->identity_verified_at ? 1 : 0,
               'comments_count' => $portfolio->portfolio->first()->comments->count(),
               'city' => $portfolio->user->city                                                                         
            );
            $i++;
         }
      }

      // * all professions by city 
      if($request['city'] && !$request['profession'] && $request['verfied'] == "false"){
         $city = City::find($request['city']);
         if($city){
            $users = User::where('City',$city->title)->get();
                  foreach($users as $user){
                     $response[$i] = array( 
                        'full_name' => $user->full_name,
                        'username' => $user->username,
                        'profession' => $user->portfolio->first()->profession->title,
                        'review_score' => number_format($user->portfolio->first()->comments->avg('review_score'),1,'.',''),
                        'is_verified' => $user->identity_verified_at ? 1 : 0,
                        'comments_count' => $user->portfolio->first()->comments->count(),
                        'city' => $portfolio->user->city                                                                                      
                     );
                     $i++;
                  }
        }
      }
      // * sorting by verified first
      $sorted = array();
      foreach ($response as $key => $row)
      {
         $sorted[$key]  = $row['is_verified'];
      }    
      // Sort the data with wek ascending order, add $mar as the last parameter, to sort by the common key
      array_multisort($sorted, SORT_DESC, $response);
 
	
      return $response;
   }

      
   

}
