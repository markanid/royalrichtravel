<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::oldest('created_at')->get();
        if ($features!=null && !$features->isEmpty()) { 
            $data['features']   = $features;
            $data['title']      = "Feature List";
            $data['page']       = "Feature";
            return view('admin.features.index',$data);
        } else {
            return redirect()->route('features.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $feature = $id ? Feature::findOrFail($id) : new Feature();
        $data['title']      = $id ? "Edit Feature" : "Create Feature";
        $data['feature']    = $feature;
        $data['page']    = "Feature";
        return view('admin.features.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:500'
        ]);

        $isNew      = empty($request->id);
        $feature    = Feature::find($request->id);

        $feature = Feature::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
        if ($feature) {
            return $isNew
                ? redirect()->route('features.index')->with('success', 'Feature created successfully.')
                : redirect()->route('features.index')->with('success', 'Feature details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update feature details.');
        }
    }

    // public function show($id=null)
    // {
    //     $feature = Feature::findOrFail($id);
    //     $data['feature']    = $feature;
    //     $data['title']      = "Feature View";
    //     $data['page']       = "Feature";
    //     return view('admin.features.view',$data);      
    // }

    public function destroy($id=null)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->route('features.index')->with('success', 'Record deleted successfully');
    }
}
