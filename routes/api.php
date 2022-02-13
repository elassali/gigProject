<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProfessionConroller;
use App\Http\Controllers\OfferController;
use App\Http\Middleware\Authenticate;
use Laravel\Sanctum\Sanctum;

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

// ! Protected Routes
Route::middleware('auth:sanctum')->group(function() { 
    Route::get('/signout',[AuthenticateController::class,'logoutuser']);
    // * load profession list
    // ? proffession crud starts
    Route::post('/user/profession/new',[UserController::class,'newprofession']);
    Route::DELETE('/user/profession/delete',[UserController::class,'detachprofession']);
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
    // * Usre Job offers CRUD ENDs


}); 
Route::get('/listprofessions',[ProfessionConroller::class,'index']);
Route::get('/loadcities',[CityController::class,'loadcities']);

// ! Public Routes

Route::get('/users',[UserController::class,'index']);
Route::post('/login',[AuthenticateController::class,'login']);
Route::post('/register',[AuthenticateController::class,'create']);

Route::get('/check',[AuthenticateController::class,'checkiflogedin']);

