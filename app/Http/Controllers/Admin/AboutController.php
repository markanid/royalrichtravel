<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class AboutController extends Controller
{
    public function index(){    
        $about = About::latest('id')->get();
        if ($about!=null && !$about->isEmpty()) {
            $data = [
                'title' => 'About',
                'page'  => 'about_us',
                'about' => $about
            ];
            return view('admin.about.index',$data);
        } else {
            return redirect()->route('about.create');
        }  
    }

    public function create($id = null){
        $about = $id ? About::findOrFail($id) : new About();
        $data['title'] = $id ? "Edit About" : "Create About";
        $data['about'] = $about;
        return view('admin.about.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'brand'         => 'required|string|max:255',
            'brand_image'   => 'nullable|image|mimes:jpg,png,jpeg|max:300000', 
        ]);

        $isNew = empty($request->id);
        $brand = Brand::find($request->id);
        
        if ($request->hasFile('brand_image')) {
            // Delete the old image if it exists
            if ($brand && $brand->brand_image) {
                Storage::disk('public')->delete('brand_logos/' . $brand->brand_image);
            }
            $file = $request->file('brand_image');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->storeAs('brand_logos', $filename, 'public'); 
            $validated['brand_image'] = $filename; 
        }    
        $brand = Brand::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
    
        if ($brand) {
            return $isNew
                ? redirect()->route('brands.index')->with('success', 'Brand created successfully.')
                : redirect()->route('brands.show', $brand->id)->with('success', 'Brand details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update brand details.');
        }
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'description' => 'required',
        'project_complete'=>'required',
        'image_1' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
        'image_2' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);

    // Save user and check result
    $result = About::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'About has been successfully created.');
        return redirect('admin/about');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id){
        $data = [
            'title' => 'Edit',
            'user'  => (array) About::getUserById($id)
        ];


        return view('admin.about.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
        'description' => 'required',
        'image_1' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
        'image_2' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);
    // Call the model's update method
    $result = About::updateAbout($request);
    if ($result === 1) {
        session()->flash('success', 'About has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'About creation failed.');
        return redirect()->back();
    }

    return redirect('admin/about');

}

    
    public function delete($id){
        $result = About::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'About deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
