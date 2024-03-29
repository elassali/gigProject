<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
// to remove after 
use App\Models\Profession;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Models\Image;
use App\Models\Portfolio;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 

    }
    // ! profile view edit in userdashboard
    // ? Profession crud starts
    public function newprofession(Request $request){ //* Add new profession
        $jobid = $request['professionID'];
        $user = Auth::user();
        if($user){
            if($user->userprofession->count() > 2){
                return response(['status' => Response::HTTP_FORBIDDEN]); // ! 403 count more than 2
            }
            elseif($user->userprofession->where('id',$jobid)->first()){
                return response(['status' => Response::HTTP_FOUND]); // ! 302 already exist
            }
            else{
                $user->userprofession()->attach($jobid); 
                $lastAddedProfession = $user->userprofession()->orderBy('id','DESC')->first();
                // * adding portfolio for this added profession
                $portfolio = new Portfolio();
                $portfolio->user_id = $user->id;
                $portfolio->profession_id = $lastAddedProfession->pivot->profession_id;
                $portfolio->save();
                return   response([
                    'status' => Response::HTTP_CREATED,
                    'userprofesions' => $lastAddedProfession
                    
                ]);
            }
            
        }
        else{
            return response(['status' => Response::HTTP_UNAUTHORIZED]);
        }
      
 
    }
    public function detachprofession(Request $request){
        $job = $request['professionID'];
        $user = Auth::user();
        if( $user->portfolio->where('profession_id',$job)->first()  ){
            if( $user->portfolio->where('profession_id',$job)->first()->images()->count() > 0){
                return response(['status' => Response::HTTP_CONFLICT]); // ! 409 status code to popup confirmation
            }
            else{
                $user->userprofession()->detach($job);
                $user->portfolio->where('profession_id',$job)->first()->delete();
                return response(['status' => Response::HTTP_ACCEPTED]); // ! 202 status code accepted
            }
            
        }    
        else{
            return "kalwa"; 
        }  
        
    }
    public function deleteConfirmed(Request $request){
        $job = $request['professionID'];
        $user = Auth::user();
        $user->userprofession()->detach($job);
        $user->portfolio->where('profession_id',$job)->first()->delete();
        return response(['status' => Response::HTTP_ACCEPTED]); // ! 202 status code accepted
    }

    //  ? ============================= update profession ========================
    public function updateexestingjob(Request $request){
        $oldjob = $request['oldprofession'];
        $newjob = $request['newprofession'];
        if( Profession::where('id',$oldjob)->first() && Profession::where('id',$oldjob)->first() )
        {
            $user = Auth::user();
            if( $user->portfolio->where('profession_id',$oldjob)->first()->images()->count() > 0){
                return response(['status' => Response::HTTP_CONFLICT]); // ! 409 status code to popup alert info of portfolio not empty
            }
            elseif($user->portfolio->where('profession_id',$newjob)->first()){
                return response(['status' => Response::HTTP_FOUND]); // ! 302 status code already exist
            }
            else{
                $user->userprofession()->updateExistingPivot($oldjob,['profession_id' => $newjob ]);
                return response([
                    'status' => Response::HTTP_ACCEPTED, // ! 202 status code updated
                    'userprofessions' =>$user->userprofession
                ]);
            }
           
            
        }
       
    }

    // ? Profession crud Ends
    // ? Profile update
    public function profileupdate(Request $request){ 
            $user = Auth::user();
            
            if($request->hasFile('profilePicture')){
                // ? save it to the server
                $file_extention = $request->file('profilePicture')->getClientOriginalName();
                $file_name = date('y_m_d_H_i_s').'_'.$file_extention;
                $path = public_path('/images/profileImages/');
                $request->file('profilePicture')->move($path,$file_name);
                // ? save it to the database
                // * Remove file from url and server if exist
                $exestingfilepath = $path.$user->image->url;
                if(file_exists($exestingfilepath)){
                    unlink($exestingfilepath);
                }
             
                $user->image()->delete(); // ? remove from datbase

                
                //* Add New image
                $profilepicture = new Image();
                $profilepicture->url = $file_name;
                $user->image()->save($profilepicture);  
            }
            $user->name = $request['firstName'];
            $user->lastname = $request['lastname'];
            $user->email = $request['email'];
            $user->city = $request['city'];
            $user->username = $request['username'];
            $user->save();                
    }
    // * User offers CRUD stats
    public function getuseroffers(){
        $user = Auth::user();
        $offers = $user->offers;
        if($offers){
            $result = [];
            $i = 0;
            foreach($offers as $offer){
                $result[$i] = (object) array('id' => $offer->id, 
                                             'offer_status' => $offer->offer_status,
                                             'profession_name' => $offer->details->profession->title,
                                             'description' => $offer->details->description,
                                             'job_date' => $offer->details->for_date,
                                             'job_expire' =>$offer->details->expired_at,
                                             'offer_details_id' => $offer->details->id,
                                             'offer_title' => $offer->details->offer_title,
                                             'city' => $offer->details->city,   
            );
                $i++; 
            }
            return $result;
        }
     
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->city = $request['city'];
        $user->phone = $request['phone'];
        $user->password =  bcrypt($request['password']);
        $user->save(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->city = $request['city'];
        $user->phone = $request['phone'];
        $user->password =  bcrypt($request['password']);
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->destroy();
    }
}
