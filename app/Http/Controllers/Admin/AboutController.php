<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Facades\Storage;

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
            'welcome'       => 'required|string|max:255',
            'glimbse'       => 'required|string|max:255',
            'our_journey'   => 'required|string|max:255',
            'vision'        => 'required|string|max:255',
            'mission'       => 'required|string|max:255',
            'our_values'    => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg|max:300000', 
        ]);

        $isNew = empty($request->id);
        $about = About::find($request->id);
        
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($about && $about->image) {
                Storage::disk('public')->delete('about_logos/' . $about->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->storeAs('about_logos', $filename, 'public'); 
            $validated['image'] = $filename; 
        }    
        $about = About::updateOrCreate(
            ['id' => $request->id ?? null], 
            $validated
        );
    
        if ($about) {
            return $isNew
                ? redirect()->route('about.index')->with('success', 'About created successfully.')
                : redirect()->route('about.show', $about->id)->with('success', 'About details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update about details.');
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
