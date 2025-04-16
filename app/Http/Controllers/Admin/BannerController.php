<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index($id = null)
    {
        $banners = Banner::latest('created_at')->first();
        if ($banners) {
            $data['banners']    = $banners;
            $data['title']      = "Banners View";
            $data['page']       = "Banners";
            return view('admin.banner.view',$data);
        } else {
            return redirect()->route('banner.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $banner = $id ? Banner::findOrFail($id) : new Banner();
        $data['title'] = $id ? "Edit Banner" : "Create Banner";
        $data['banner'] = $banner;
        $data['page']   = "Banners";
        return view('admin.banner.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'banner.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $isNew  = empty($request->id);
        $banner = Banner::find($request->id);

        $existingImages = $banner?->banner ?? [];
        $imagePaths = [];

        if ($request->hasFile('banner')) {
            // Delete old images
            if ($existingImages && is_array($existingImages)) {
                foreach ($existingImages as $img) {
                    if (Storage::disk('public')->exists('banners/' . $img)) {
                        Storage::disk('public')->delete('banners/' . $img);
                    }
                }
            }
            // Save new images
            foreach ($request->file('banner') as $image) {
                $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('banners', $filename, 'public');
                $imagePaths[] = $filename;
            }
        }
        else {
            // If no new images uploaded, keep the old ones
            $imagePaths = $existingImages;
        }
        $validated['banner'] = $imagePaths;
        $banner = Banner::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($banner) {
            return $isNew
                ? redirect()->route('banner.index')->with('success', 'Banner created successfully.')
                : redirect()->route('banner.index')->with('success', 'Banner details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update banner details.');
        }
    }

    public function show($id = null)
    {
        $banners = Banner::latest('created_at')->first();
        $data['banners']    = $banners;
        $data['title']      = "Banners View";
        $data['page']       = "Banners";
        return view('admin.banner.view',$data);      
    }
}
