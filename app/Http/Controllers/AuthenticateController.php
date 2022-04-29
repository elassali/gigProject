<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class AuthenticateController extends Controller
{
    public function login(Request $request){
        if(!Auth::attempt([
             "email" => $request["email"],
             "password" => $request["password"]
         ])){ 
             return response([
                 "message" => "Email Or Password is Incorect",
                 "status" => Response::HTTP_UNAUTHORIZED // 401 
             ]);
         }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken; 

        
        return response([
            "message" => $token,
        ]); 
     }

//! ================================================  
     protected function create(Request $request){
            $user = User::Create([
                'username' => $request['username'], 
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            $token = $user->createToken('token')->plainTextToken; 
            return response(["user" => $user, "token" => $token],Response::HTTP_CREATED);
        }
//! ================================
    public function account(){
        $user = Auth::user();
        $data = array();
        if($user){
            $profession = $user->userprofession;
            $profilePicture = "/images/profileImages/".$user->image->url;
            $user = DB::table('users')
                        ->where('id',$user->id)
                        ->select('name','lastname','city','created_at','email','phone','username','date_of_birth')
                        ->first();
            
            $allprofession = Profession::all();
           
        }
           
        return response([
                'user' => $user,
                'userprofession' =>$profession,
                'allprofession' => $allprofession,
                'profilePicture' => $profilePicture
            ]);
        
     }

// ! ==============================
     public function logoutuser(){
         $user = Auth::user();
         $user->tokens()->delete();
         Auth::guard('web')->logout();
            return response([
                "message" => "See you later :)"
            ]);
        } 

//! ======================================
     public function checkiflogedin(){
        return response(["islogedin" => auth('sanctum')->check()]);
     }        

}
