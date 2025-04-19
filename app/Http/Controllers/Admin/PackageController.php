<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::oldest('created_at')->get();
        if ($packages!=null && !$packages->isEmpty()) { 
            $data['packages']   = $packages;
            $data['title']      = "Package List";
            $data['page']       = "Package";
            return view('admin.packages.index',$data);
        } else {
            return redirect()->route('packages.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $package = $id ? Package::findOrFail($id) : new Package();
        $data['title']      = $id ? "Edit Package" : "Create Package";
        $data['package']    = $package;
        $data['page']       = "Package";
        return view('admin.packages.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:500',
            'description'   => 'required|string|max:500',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $isNew      = empty($request->id);
        $package    = Package::find($request->id);

        if ($request->hasFile('image')) {
            if ($package && $package->image) {
                Storage::disk('public')->delete('packages/' . $package->image);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Unique filename
            $file->storeAs('packages', $filename, 'public'); // Store in storage/app/public/company_logos
            $validated['image'] = $filename; // Save filename to database
        }

        $package = Package::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($package) {
            return $isNew
                ? redirect()->route('packages.index')->with('success', 'Package created successfully.')
                : redirect()->route('packages.index')->with('success', 'Package details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update package details.');
        }
    }

    public function show($id=null)
    {
        $package = Package::findOrFail($id);
        $data['package']    = $package;
        $data['title']      = "Package View";
        $data['page']       = "Package";
        return view('admin.packages.view',$data);      
    }
    public function destroy($id=null)
    {
        $package = Package::findOrFail($id);
        if (!empty($package->image) && Storage::disk('public')->exists('packages/' . $package->image)) {
            Storage::disk('public')->delete('packages/' . $package->image);
        }
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Record deleted successfully');
    }
}
