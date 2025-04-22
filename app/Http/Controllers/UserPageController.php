<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
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
        return view("users.home", [
            'banners'  => Banner::oldest('created_at')->get(),
            'about'    => About::oldest('created_at')->first(),
            'services' => Service::oldest('created_at')->get(),
            'features' => Feature::oldest('created_at')->get(),
            'packages' => Package::oldest('created_at')->get(),
            'contact'  => Contact::oldest('created_at')->first(),
        ]);
    }

    public function about() {
        return view("users.about", [
            'about'    => About::oldest('created_at')->first(),
            'services' => Service::oldest('created_at')->get(),
            'contact'   => Contact::oldest('created_at')->first(),
        ]);
    }

    public function contact() {
        return view("users.contact", [
            'contact'   => Contact::oldest('created_at')->first(),
            'services'  => Service::oldest('created_at')->get(),
        ]);
    }

    public function service() {
        return view("users.services", [
            'services' => Service::oldest('created_at')->get(),
            'contact'   => Contact::oldest('created_at')->first(),
        ]);
    }

    public function servicedetails($slug) {
        return view("users.service-details", [
            'services'  => Service::oldest('created_at')->get(),
            'service'   => Service::where('slug', $slug)->firstOrFail(),
            'contact'   => Contact::oldest('created_at')->first(),
        ]);
    }

    public function package() {
        return view("users.packages", [
            'services' => Service::oldest('created_at')->get(),
            'packages' => Package::oldest('created_at')->get(),
            'contact'   => Contact::oldest('created_at')->first(),
        ]);
    }

    public function packagedetails($id) {
        return view("users.packages-details", [
            'services'  => Service::oldest('created_at')->get(),
            'package'   => Package::findOrFail($id),
            'contact'   => Contact::oldest('created_at')->first(),
        ]);
    }
    
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'nullable|string|max:20',
            'comment'   => 'nullable|string|max:1000',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Mail::to('your@mailtrap.inbox@example.com.com')->send(new ContactFormMail($request->all()));
            return redirect()->back()->with('success_message', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', 'Sorry there was an error sending your form.');
        }
    }
}
