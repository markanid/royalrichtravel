<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){

        $validator = Validator::make($request->all(), [
            "email"     => 'required|email',
            "password"  => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
                return redirect()->route('dashboard')->with('success', 'Login Successfull');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }

        } else {
            return redirect()->route('getLogin')
            ->withInput()
            ->withErrors($validator); 
        }
    }
}
