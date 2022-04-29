<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProfessionConroller;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryManagerController;
use App\Http\Middleware\Authenticate;
use Laravel\Sanctum\Sanctum;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// ! admin previleges only
Route::get('/admin/allusers',[UsersController::class,'getAllusers']);
// Route::middleware('adminAuthorization:api')->group(function() { 



// });
// ! Protected Routes 
Route::middleware('auth:sanctum')->group(function() { 
    Route::get('/signout',[AuthenticateController::class,'logoutuser']);
    // * load profession list
    // ? proffession crud starts
    Route::post('/user/profession/new',[UserController::class,'newprofession']);
    Route::DELETE('/user/profession/delete',[UserController::class,'detachprofession']);
    Route::DELETE('/user/profession/deleteconfirmed',[UserController::class,'deleteConfirmed']);//? delete confirmed
    Route::put('/user/profession/update',[UserController::class,'updateexestingjob']);
    // ? proffession crud Ends
    // ? profile CRUD stats
    Route::get('/my-information',[AuthenticateController::class,'account']);// ? fetch user info [including his professions]
    Route::post('/user/profile/update',[UserController::class,'profileupdate']); 
    // ? profile CRUD ENDs
    // * Usre Job offers CRUD starts
    Route::get('/my-Job-offers',[UserController::class,'getuseroffers']);
    //  ? create new offer
    Route::post('/create-job',[OfferController::class,'createnewoffre']);
    // ? quick edit offer_status 
    Route::put('/quick-status-edit',[OfferController::class,'quickeditstatus']);
    // ? delete Offer with it's detail
    Route::DELETE('/offer-delete',[OfferController::class,'deleteoffer']);
    // ? edit offer ((only return offer data to display to the user in order if he wants to edit it))
    Route::get('/offer-edit',[OfferController::class,'editoffer']);
    // ? update offer 
    Route::put('/offer-update',[OfferController::class,'updateoffer']);
    // * Usre Job offers CRUD ENDs

    // * Report start
    Route::post('/new-report',[IndexController::class,'newReport']);

    // * get connected user conversations
    Route::get('/get-all-conversation',[ContactController::class,'getconversations']);
    // ? load current conversation
    Route::get('/load-conversation',[ContactController::class,'loadconversation']);
    // ? send new message
    Route::post('/new-message',[ContactController::class,'newMessage']);
    // ? first contact
    Route::post('/contact',[ContactController::class,'contact']); 
    // ? get user phone number
    Route::get('/user-phone',[ContactController::class,'getPhoneNumber']);

    // * get connected user professions [Gallery manager]
    Route::get('/gallerymanager',[GalleryManagerController::class,'getPortfolios']);
    Route::get('/portfolio',[GalleryManagerController::class,'professionImages']);
    // ! add images
    Route::post('/add-professionion-images',[GalleryManagerController::class,'addImages']);
    // ! Remove images
    Route::delete('/remove-professionion-images',[GalleryManagerController::class,'removeImages']);


}); 




// ? get profile
Route::get('/user-profile',[IndexController::class,'profile']);
 
// ? get galery
Route::get('/profession-galery',[IndexController::class,'getgalery']);

// * comments
// ? get comments
Route::get('/comments',[CommentController::class,'getcomments']);
Route::post('/comments/create',[CommentController::class,'createcomment']);
Route::put('/comments/update',[CommentController::class,'updatecomment']);
Route::delete('/comments/delete',[CommentController::class,'deletecomment']);
// ? Replies
Route::post('/reply/create',[CommentController::class,'createreply']);
Route::put('/reply/update',[CommentController::class,'updatereply']);
Route::delete('/reply/delete',[CommentController::class,'deletereply']);

// ! get list of cities and professions
Route::get('/listprofessions',[ProfessionConroller::class,'index']);
Route::get('/loadcities',[CityController::class,'loadcities']);

// ! Public Routes
Route::get('/talents',[IndexController::class,'talents']);
Route::get('/filter-talents',[IndexController::class,'filtertalents']);
Route::post('/login',[AuthenticateController::class,'login']);
Route::post('/register',[AuthenticateController::class,'create']);

// ! check if user is logged in
Route::get('/check',[AuthenticateController::class,'checkiflogedin']);

// check report response status
Route::get('/report-status',[IndexController::class,'checkreport']);
