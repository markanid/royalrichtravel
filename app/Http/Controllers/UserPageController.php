<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function home() {
        
        return view("users.home");
    }

    public function about() {
        
        return view("users.about");
    }

    public function contact() {
        
        return view("users.contact");
    }

    public function service() {
        
        return view("users.services");
    }

    public function servicedetails() {
        
        return view("users.service-details");
    }

    public function package() {
        
        return view("users.packages");
    }
}
