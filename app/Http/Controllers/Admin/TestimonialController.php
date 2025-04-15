<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class TestimonialController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Testimonial',
            'about' => Testimonial::getAllUsers()
        ];
        return view('admin.testimonial.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'Testimonial'
        ];
        return view('admin.testimonial.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
                        'name' => 'required',
                         'designation' => 'required',
                        'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);

    // Save user and check result
    $result = Testimonial::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Testimonial has been successfully created.');
        return redirect('admin/testimonial');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'user'  => (array) Testimonial::getUserById($id)
        ];
        return view('admin.testimonial.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
                            'name' => 'required',
                            'designation'=>'required',
                            'client_image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);
    // Call the model's update method
    $result = Testimonial::updateAbout($request);
    if ($result === 1) {
        session()->flash('success', 'testimonial has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'testimonial creation failed.');
        return redirect()->back();
    }

    return redirect('admin/testimonial');

}

    
    public function delete($id){
        $result = Testimonial::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Testimonial deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
