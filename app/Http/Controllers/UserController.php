<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Method to login user - It verifies the user credentials
     * if there is a match it redirects the user to the authorized page
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request){
        Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);
        return redirect()->route('admin_dashboard');
    }

    /**
     * Method to log the user out
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
