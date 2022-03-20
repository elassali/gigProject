<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use App\Models\Image;
use App\Models\Profession;
use Symfony\Component\HttpFoundation\Response;

class GalleryManagerController extends Controller
{
    public function getPortfolios(){
        $user = Auth::user();
        $data =array();
        $i=0;
        $profession = Profession::all();

        if($user){
            if($user->portfolio->count() > 0){
                foreach($user->portfolio as $portfolio){
                    $data[$i] = (object) array(
                        'id' => $portfolio->id,
                        'professionName' => $portfolio->profession->title,
                        'iamgesCount' => $portfolio->images->count(),

                    );
                    $i++;                     
                }
                return response(['data' => $data,'professions' => $profession]);
            }
        }
       
    }

    public function professionImages(Request $request){
        $user = Auth::user();
        $data = array();
        $i = 0;
        if($user){
           
            $portfolio = $user->portfolio->where('id',$request['portfolioID'])->first();
            if( $portfolio && $portfolio->images->count() > 0 ){
                foreach($portfolio->images as $image){
                    $data[$i] = (object) array(
                        'id' => $image->id,
                        'url' => '/images/professionImages/'.$image->url // 
                    );
                    $i++;
                }
                return response(['status' => Response::HTTP_ACCEPTED,'images' => $data]);
            }
            else{
                return response(['status' => Response::HTTP_NO_CONTENT]);
            }
        }
    }

    // * add images
    public function addImages(Request $request){
        $PortfolioId = $request['portfolioID'];
        $user = Auth::user();
        $portfolio = $user->portfolio->where('id',$PortfolioId)->first();
        // ? check if Portfolio belongs to connected user
            if($portfolio){

                foreach($request->file('images') as $image){
                    // ? save it to the server
                    $file_extention = $image->getClientOriginalName();
                    $file_name = date('y_m_d_H_i_s').'_'.$file_extention;
                    $path = public_path('/images/professionImages/');
                    $image->move($path,$file_name);
                    
                    // ? save it to database
                    $portfolioImage = new Image();
                    $portfolioImage->url = $file_name;
                    $portfolio->images()->save($portfolioImage);
                }
                return "all set";
            }
            else{
                return "error";
            }
    
       
        

    }
    // * remove images
    public function removeImages(Request $request){
        $portfolioId = $request['portfolioId'];
        $user = Auth::user();
        $portfolio = $user->portfolio->where('id',$portfolioId)->first();
        $path = public_path('/images/professionImages/');
        // ? check if Portfolio belongs to connected user
        if($portfolio){
            foreach($request['images'] as $imageID){
                $image = $portfolio->images->where('id',$imageID)->first();
                // ? check if image exist in the server 
                $exestingfilepath = $path.$image->url;
                if(file_exists($exestingfilepath)){
                    // ? remove it from the server
                    unlink($exestingfilepath);
                    // ? remove it from database
                    $image->delete();
                }
                return "all set";
            }
            
        }
        else{
            return "error";
        }
    }
}
