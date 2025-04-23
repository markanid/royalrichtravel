<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Contact;
use App\Models\Admin\Feature;
use App\Models\Admin\MetaData;
use App\Models\Admin\Package;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserPageController extends Controller
{
    public function home() {
        return view("users.home", [
            'banners'  => Banner::oldest('created_at')->get(),
            'about'    => About::oldest('created_at')->first(),
            'features' => Feature::oldest('created_at')->get(),
            'packages' => Package::oldest('created_at')->get(),
        ]);
    }

    public function about() {
        return view("users.about", [
            'about'    => About::oldest('created_at')->first(),
        ]);
    }

    public function contact() {
        return view("users.contact");
    }

    public function service() {
        return view("users.services");
    }

    public function servicedetails($slug) {
        return view("users.service-details", [
            'service'   => Service::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function package() {
        return view("users.packages", [
            'packages' => Package::oldest('created_at')->get(),
        ]);
    }

    public function packagedetails($slug) {
        return view("users.packages-details", [
            'package'   => Package::where('slug', $slug)->firstOrFail(),
        ]);
    }
    
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'nullable|string|max:100',
            'phone'     => 'nullable|string|max:100',
            'comment'   => 'nullable|string|max:1000',
            'source'    => 'nullable|string|max:100',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Mail::to('info@apexsoftlabs.com')->send(new ContactFormMail($request->all()));
            return redirect()->back()->with('success_message', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Mail Send Error: ' . $e->getMessage());
            return redirect()->back()->with('error_message', 'Sorry there was an error sending your form.');
        }
    }
}
