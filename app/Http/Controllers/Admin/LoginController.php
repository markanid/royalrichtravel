<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Admin\Project;
use App\Models\Admin\Brand;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            "email"     => 'required|email',
            "password"  => 'required'
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
                    return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error','Email or Password is incorrect'); 
            }

        } else {
            return redirect()->route('login')
            ->withInput()
            ->withErrors($validator); 
        }
    }

    public function registration(){
        return view('admin.auth.register');
    }

    public function dashboard(){
        $categories = Category::count();
        $projects   = Project::count();
        $brands     = Brand::count();
        $services   = Service::count();
        return view('admin.dashboard', compact('categories','projects','brands','services'));
    }

    public function registerProcess(Request $request){
        $validator = Validator::make($request->all(), [
            "name"=> 'required',
            "email"=> 'required|email|unique:users',
            "password"=> 'required|min:8|confirmed'
            ]);
            if ($validator->passes()) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = 'staff';
                $user->save();
                return redirect()->route('login')->with('success', 'You have registered successfully...');
        } else {
            return redirect()->route('registration')
            ->withInput()
            ->withErrors($validator); 
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function showChangePasswordForm(){
        return view('admin.auth.changepassword');
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'          => 'required',
            'new_password'              => 'required|min:8|confirmed',  // You can adjust the password requirements
            'new_password_confirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('changePasswordForm')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        // Check if the current password matches the user's current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('changePasswordForm')
                ->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Your password has been changed successfully!');
    }
}
