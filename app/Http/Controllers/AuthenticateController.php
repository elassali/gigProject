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
class AuthenticateController extends Controller
{
    public function login(Request $request){
        if(!Auth::attempt([
             "email" => $request["email"],
             "password" => $request["password"]
         ])){ 
             return response([
                 "message" => "Email Or Password is Incorect",
             ], Response::HTTP_UNAUTHORIZED );
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
        $profession = $user->userprofession;
        $allprofession = Profession::all();
        $profilePicture = "/images/profileImages/".$user->image->url;
        return ['data' => $user,'userprofession' =>$profession, 'allprofession' => $allprofession, 'profilePicture' => $profilePicture];
        
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
