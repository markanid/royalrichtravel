<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::oldest('created_at')->get();
        if ($services!=null && !$services->isEmpty()) { 
            $data['services']   = $services;
            $data['title']      = "Service List";
            $data['page']       = "Service";
            return view('admin.services.index',$data);
        } else {
            return redirect()->route('services.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $service = $id ? Service::findOrFail($id) : new Service();
        $data['title'] = $id ? "Edit Service" : "Create Service";
        $data['service'] = $service;
        $data['page']   = "Service";
        return view('admin.services.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:500',
            'description'   => 'nullable|string|max:500',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $isNew      = empty($request->id);
        $service    = Service::find($request->id);

        if ($request->hasFile('image')) {
            if ($service && $service->image) {
                Storage::disk('public')->delete('services/' . $service->image);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Unique filename
            $file->storeAs('services', $filename, 'public'); // Store in storage/app/public/company_logos
            $validated['image'] = $filename; // Save filename to database
        }

        $service = Service::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($service) {
            return $isNew
                ? redirect()->route('services.index')->with('success', 'Service created successfully.')
                : redirect()->route('services.index')->with('success', 'Service details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update service details.');
        }
    }

    public function show($id=null)
    {
        $service = Service::findOrFail($id);
        $data['service']    = $service;
        $data['title']      = "Service View";
        $data['page']       = "Service";
        return view('admin.services.view',$data);      
    }
    public function destroy($id=null)
    {
        $service = Service::findOrFail($id);
        if (!empty($service->image) && Storage::disk('public')->exists('services/' . $service->image)) {
            Storage::disk('public')->delete('services/' . $service->image);
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Record deleted successfully');
    }
}
