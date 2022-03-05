<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;

class CommentController extends Controller
{
    // ? get Comments and replies
    public function getcomments(Request $request){

        $portfolio = Portfolio::findOrFail($request['portfolio']);
        $comments = [];
        $connected_user = auth('sanctum')->check() ? Auth::user()->id : "Disconnected";
        $i = 0;
        $defaultAvatarImage =  public_path('/images/profileImages/default_profile_picture');
        if($portfolio){
            foreach($portfolio->comments as $comment){
                global $defaultAvatarImage;
                $comments[$i] =  (object) array(
                    'id' => $comment->id,
                    'comment' => $comment->comment,
                    'full_name' => $comment->user->full_name,
                    'avatar' => isset($comment->user->image) ? $comment->user->image['url'] : "/images/profileImages/default_profile_picture.jpg", 
                    'comment_date' => date('h:i A', strtotime($comment->created_at)),
                    'comment_score' =>$comment->review_score, 
                    'user_id' => $comment->user->id,
                    'replies' => $comment->replies->map(function($reply){
                            return array(
                                'id' => $reply->id,
                                'reply' => $reply->reply,
                                'reply_date' => date('h:i A', strtotime($reply->created_at,)),
                                'full_name' => $reply->user->full_name,
                                'avatar' => isset($reply->user->image) ? $reply->user->image['url'] : "/images/profileImages/default_profile_picture.jpg",
                                'user_id' => $reply->user->id,
                            );
                    })
                );
                $i++;
            }
        }
        return response(['comments' => $comments,
                         'isconnected' => $connected_user   
        ]);
    }
    // ? create new comment
    public function createcomment(Request $request){
        $user = Auth::user();
        if($user){
            $comment = new Comment();
            $comment->comment = $request['body'];
            $comment->portfolio_id = $request['portfolio'];
            $comment->commentable()->associate($user);
            $comment->save();
        }
    }
    // ? update exesting comment
    public function updatecomment(Request $request){
        $user = Auth::user();
        if($user){
            $comment = $user->comments->findOrFail($request['comment']);
            if($comment){
                $comment->comment = $request['body'];
                $comment->save();
            }
        }  
    }
    public function deletecomment(Request $request){ // ! only comment owner can delete his comment 
        $user = Auth::user();
        if($user){
            $comment = $user->comments->findOrFail($request['comment']);
            $comment->delete();
        }

    }// TODO : ADD admin can delete comment and also profile owner can delete unverified comments



    // * ================================ Reply section ============================
    // ? create a commnt reply
    public function createreply(Request $request){
        $user = Auth::user();
        $reply = new Reply();
        $reply->user_id = $user->id;
        $reply->comment_id = $request['comment'];
        $reply->reply = $request['body'];
        $reply->save();
    }
    public function updatereply(Request $request){
        $user = Auth::user();
        if($user){
            $reply = $user->replies->findOrFail($request['reply']);
            $reply->reply = $request['body'];
            $reply->save();
        }
    }
    public function deletereply(Request $request){
        $user = Auth::user();
        if($user){
            $reply = $user->replies->findOrFail($request['reply']);
            $reply->delete();
        }
    }



}

