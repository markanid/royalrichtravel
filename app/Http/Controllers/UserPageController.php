<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Contact;
use App\Models\Admin\Feature;
use App\Models\Admin\Package;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserPageController extends Controller
{
    public function home() {
        $banners            = Banner::oldest('created_at')->get();
        $about              = About::oldest('created_at')->first();
        $services           = Service::oldest('created_at')->get();
        $features           = Feature::oldest('created_at')->get();
        $contact            = Contact::oldest('created_at')->first();
        $data['banners']    = $banners;
        $data['about']      = $about;
        $data['services']   = $services;
        $data['features']   = $features;
        $data['contact']    = $contact;
        return view("users.home", $data);
    }

    public function about() {
        $services           = Service::oldest('created_at')->get();
        $about              = About::oldest('created_at')->first();
        $data['services']   = $services;
        $data['about']      = $about;
        return view("users.about", $data);
    }

    public function contact() {
        $services           = Service::oldest('created_at')->get();
        $contact            = Contact::oldest('created_at')->first();
        $data['services']   = $services;
        $data['contact']    = $contact;
        return view("users.contact", $data);
    }

    public function service() {
        $services           = Service::oldest('created_at')->get();
        $data['services']   = $services;
        return view("users.services", $data);
    }

    public function servicedetails($id) {
        $services           = Service::oldest('created_at')->get();
        $service            = Service::findOrFail($id);
        $data['services']   = $services;
        $data['service']    = $service;
        return view("users.service-details", $data);
    }

    public function package() {
        $services           = Service::oldest('created_at')->get();
        $packages           = Package::oldest('created_at')->get();
        $data['services']   = $services;
        $data['packages']   = $packages;
        return view("users.packages", $data);
    }

    public function packagedetails($id) {
        $services           = Service::oldest('created_at')->get();
        $package            = Package::findOrFail($id);
        $data['services']   = $services;
        $data['package']    = $package;
        return view("users.packages-details", $data);
    }
    
    public function sendEmail(Request $request) {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|string|max:20',
            'message'   => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Send the email
        try {
            Mail::to('gm@alemadisolutions.com')->send(new ContactMail($request->all()));
            return redirect()->back()->with('success_message', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', 'Sorry there was an error sending your form.');
        }
    }
}
