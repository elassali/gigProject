<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use Symfony\Component\HttpFoundation\Response;
use App\Events\newChatMessage;

class ContactController extends Controller
{
    // * ====================== Get connected users conversation ==============================
    public function getconversations(){
        $user = Auth::user();
        if($user){
            $allconversation = Conversation::where('sender',$user->id)->orWhere('recipent',$user->id)->get();
            $conversations = array();
            $i = 0;
            
            foreach($allconversation as $conversation){
                $sender='';
                if($conversation->correspondent->id !== $user->id){
                    $sender = $conversation->correspondent->getFullNameAttribute();
                }
                else{
                    $sender = $conversation->receiver->getFullNameAttribute();
                }
                $conversations[$i] = (object)array(
                                            "sender" => $sender,
                                            "correspondent" =>  $conversation->sender, // ? id of the sender
                                            "recipent" => $conversation->recipent, // ? id of recipent
                                            "conversation" => $conversation->id,
                                          );
                $i++;                          
            }
             
            return $conversations;
        }
        else{
            return response(['status' => Response::HTTP_UNAUTHORIZED]);
        }
    }
     // * =============================== Load selected conversation ============================
     public function loadconversation(Request $request){
         $user = Auth::user()->id;
        $conversation = Conversation::find($request['conversation']);
        if($conversation){
            $i = 0 ;
            $messages = array();
            foreach($conversation->messages as $message){
                $messages[$i] = (object) array(
                    'message' => $message->message,
                    'correspondent' => $message->belongsto,
                    'connecteduser' => $user,
                    'created_at' => $message->created_at
                );
                $i++;
            }
            return $messages;
        }
        else{
            return response(['status'=> Response::HTTP_BAD_REQUEST]);
        }
    }

    // * ======================= new message in realchat conversation =========================
    // TODO : fix it it's not like contact function you have to send conversation id in request to get the recipent 
    public function newMessage(Request $request){
        $sender = Auth::user(); // ? get Authenticated user
        $conversation = Conversation::where('id',$request['conversation'])->first();
        if($sender){
              // ? check if conversation exist
            if(!$conversation){
                return response(['status' => Response::HTTP_NOT_FOUND]);
            }
            else{
                $message = new Message();
                $message->conversation_id = $conversation->id;
                $message->belongsto = $sender->id;
                $message->message = $request['message'];
                $message->save();
                $messages = array();
                    $messages = (object) array(
                        'conversation_id' => $message->conversation_id,
                        'message' => $message->message,
                        'correspondent' => $message->belongsto,
                        'connecteduser' => $sender->id,
                        'created_at' => $message->created_at
                    );
                broadcast(new newChatMessage($message))->toOthers();
                return $messages;
            }
            

        }
        else{
            return response(['status' => Response::HTTP_UNAUTHORIZED]);
        }
      
        
    }
    // * ================ First Contact from user profile ==================
    public function contact(Request $request){
        $sender = Auth::user(); // ? get Authenticated user
        $recipent = User::where('username',$request['username'])->first();
        if($sender && $recipent){
              // ? check if conversation exist
            $conversation = Conversation::where('sender',$sender->id)->where('recipent',$recipent->id)->first();
            if(empty($conversation)){
                $conversation = new Conversation();
                $conversation->sender = $sender->id;
                $conversation->recipent = $recipent->id;
                $conversation->save();
            }
            $message = new Message();
            $message->conversation_id = $conversation->id;
            $message->belongsto = $recipent->id;
            $message->message = $request['message'];
            $message->save();
            broadcast(new newChatMessage($message))->toOthers();
            return response($conversation->id);

        }
        else{
            return response(['status' => Response::HTTP_UNAUTHORIZED]);
        }
      
        
    }
    // * ============================ Get user Phone number =======================
    public function getPhoneNumber(Request $request){
        $user = User::where('username',$request['username'])->first();
        if($user){
            return response(['status' => Response::HTTP_ACCEPTED,'phone' =>$user->phone]);
        }
        else{
            return "hello";
        }

    } 

   
}
