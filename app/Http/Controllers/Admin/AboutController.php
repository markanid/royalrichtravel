<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest('created_at')->first();
        if ($about!=null) {
            $data['about']  = $about;
            $data['title']      = "About View";
            $data['page']       = "About Data";
            return view('admin.about.view',$data);
        } else {
            return redirect()->route('about.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $about = $id ? About::findOrFail($id) : new About();
        $data['title'] = $id ? "Edit About" : "Create About";
        $data['about'] = $about;
        $data['page']   = "About";
        return view('admin.about.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'welcome'       => 'required|string|max:1000',
            'glimbse'       => 'required|string|max:1000',
            'our_journey'   => 'required|string|max:2000',
            'vision'        => 'required|string|max:1000',
            'mission'       => 'required|string|max:1000',
            'our_values'    => 'required|string|max:1000',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $isNew  = empty($request->id);
        $about = About::find($request->id);

        if ($request->hasFile('image')) {
            if ($about && $about->image) {
                Storage::disk('public')->delete('abouts/' . $about->image);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Unique filename
            $file->storeAs('abouts', $filename, 'public'); // Store in storage/app/public/company_logos
            $validated['image'] = $filename; // Save filename to database
        }

        $about = About::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($about) {
            return $isNew
                ? redirect()->route('about.index')->with('success', 'About created successfully.')
                : redirect()->route('about.index')->with('success', 'About details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update about details.');
        }
    }

    public function show($id=null)
    {
        $about = About::latest('created_at')->first();
        $data['about']  = $about;
        $data['title']  = "About View";
        $data['page']   = "About";
        return view('admin.about.view',$data);      
    }
    public function destroy($id=null)
    {
        $about = About::firstOrFail();
        if (!empty($about->image) && Storage::disk('public')->exists('abouts/' . $about->image)) {
            Storage::disk('public')->delete('abouts/' . $about->image);
        }
        $about->delete();
        return redirect()->route('about.index')->with('success', 'Record deleted successfully');
    }
}
