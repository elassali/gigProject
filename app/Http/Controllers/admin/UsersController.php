<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getAllusers(){
        if( Auth::check() ){
            $defaultProfilePicture = '/images/profileImages/default_profile_picture.jpg';
            $users = DB::table('users')
                         ->join('images',function($join){
                            $join->on('users.id','=','images.imageable_id')
                                ->where('images.imageable_type','=','App\Models\User');
                         })
                         ->select(DB::raw("CONCAT(users.name,' ',users.lastname) AS fullname"),'users.id','users.username','users.date_of_birth','users.last_session','users.isrestricted','images.url AS profilePicture')
                         ->paginate(15);
         
            return response([
                'status' => Response::HTTP_ACCEPTED,
                'data' => $users
            ]);
        }
        else{
            return response([
                'status' => Response::HTTP_FORBIDDEN
            ]);
        }
        
    }

    public function suspendUser(Request $request){
        if(Auth::user()){
            $userId = $request['userID'];
            $user = User::find($userId);
            if($user){
                $user->isrestricted = true;
                $user->save();
                return response([
                    'status' => Response::HTTP_CREATED//? user suspended succesfully 201
                ]);
            }
            else{
                return response([
                    'status' => Response::HTTP_NOT_FOUND //? user not found 404
                ]);
            }
        }
        else{
            return response([
                'status' => Response::HTTP_UNAUTHORIZED //? not authorized 401
            ]);
        }
        
    }
    public function unsuspendUser(Request $request){
        if(Auth::user()){
            $userId = $request['userID'];
            $user = User::find($userId);
            if($user){
                $user->isrestricted = false;
                $user->save();
                return response([
                    'status' => Response::HTTP_CREATED//? user suspended succesfully 201
                ]);
            }
            else{
                return response([
                    'status' => Response::HTTP_NOT_FOUND //? user not found 404
                ]);
            }
        }
        else{
            return response([
                'status' => Response::HTTP_UNAUTHORIZED //? not authorized 401
            ]);
        }
    }
    public function deleteUser($id){
        if( Auth::check() ){
            User::find($id)->destroy();
            return response([
                'status' => Response::HTTP_CREATED//? user suspended succesfully 201
            ]);
        }
        else{
            return response([
                'status' => Response::HTTP_UNAUTHORIZED //? not authorized 401
            ]);
        }
    }

}
