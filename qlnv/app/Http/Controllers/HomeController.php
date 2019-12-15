<?php

namespace App\Http\Controllers;

use Illuminate \Http \ Request;
use  Illuminate \ Support \ Facades \ Hash;
use  Illuminate \ Support \ Facades \ Auth;
use App\User;
//use App\Http\Controllers\PasswordExpiredRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function changePassword(Request  $request){
       
        // if (!Hash::check($request->current_password, Auth()->user()->password)) {
        //     return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
        // }
       // dd($request['password']);
        $id = Auth::user()->id;
        
        $user = User::find($id);
        $user->password = Hash::make($request['password']);
        $user->password_changed_at = true;
        $user->save();
         return redirect()->route('login');
    }
    }

