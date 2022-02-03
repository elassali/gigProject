<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
// to remove after 
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  User::all();
        // $users = User::findOrFail(1);
        // return [
        //     'id' => $users->id,
        //     'firstname' => $users->name,
        //     'lastname' => $users->lastname,
        //     'dateofbirth' => $users->date_of_birth,
        //     'phone' => $users->username,
        //     'adress' => $users->city,
        // ];

     



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
