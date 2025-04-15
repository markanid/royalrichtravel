<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard(){
        $today          = date('Y-m-d');
        $user_type      = Auth::user()->is_admin;
        $user_id        = Auth::user()->id;
        $employeeCount  = DB::table('users')->count();
        
        $data = [
            'title'         => 'Dashboard',
            'user_type'     => $user_type
        ];
        return view('admin.dashboard', $data);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You have been successfully Logged out');
    }
}
