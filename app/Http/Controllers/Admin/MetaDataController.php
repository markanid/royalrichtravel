<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetaDataController extends Controller
{
    public function index()
    {
        $meta_data = MetaData::latest('created_at')->first();
        if ($meta_data!=null) {
            $data['meta_data']  = $meta_data;
            $data['title']      = "Meta Data View";
            $data['page']       = "Meta Data";
            return view('admin.meta_data.view',$data);
        } else {
            return redirect()->route('meta_data.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $meta_data = $id ? MetaData::findOrFail($id) : new MetaData();
        $data['title'] = $id ? "Edit Meta Data" : "Create Meta Data";
        $data['meta_data'] = $meta_data;
        $data['page']   = "Meta Data";
        return view('admin.meta_data.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:2000',
            'desciption'    => 'required|string|max:2000',
            'keyword'       => 'required|string|max:2000',
            'og_image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $isNew  = empty($request->id);
        $meta_data = MetaData::find($request->id);

        if ($request->hasFile('og_image')) {
            if ($meta_data && $meta_data->og_image) {
                Storage::disk('public')->delete('meta_datas/' . $meta_data->og_image);
            }
            $file = $request->file('og_image');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Unique filename
            $file->storeAs('meta_datas', $filename, 'public'); // Store in storage/app/public/company_logos
            $validated['og_image'] = $filename; // Save filename to database
        }

        $meta_data = MetaData::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($meta_data) {
            return $isNew
                ? redirect()->route('meta_data.index')->with('success', 'Meta Data created successfully.')
                : redirect()->route('meta_data.index')->with('success', 'Meta Data details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update meta data details.');
        }
    }

    public function show($id=null)
    {
        $meta_data = MetaData::latest('created_at')->first();
        $data['meta_data']  = $meta_data;
        $data['title']      = "Meta Data View";
        $data['page']       = "Meta Data";
        return view('admin.meta_data.view',$data);      
    }
    public function destroy($id=null)
    {
        $meta_data = MetaData::firstOrFail();
        if (!empty($meta_data->og_image) && Storage::disk('public')->exists('meta_datas/' . $meta_data->og_image)) {
            Storage::disk('public')->delete('meta_datas/' . $meta_data->og_image);
        }
        $meta_data->delete();
        return redirect()->route('meta_data.index')->with('success', 'Record deleted successfully');
    }
}
