<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class ServicesController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Services',
            'about' => Services::getAllUsers()
        ];
        return view('admin.services.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'Services'
        ];
        return view('admin.services.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
                        'name' => 'required',
                         'description' => 'required',
                        'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);

    // Save user and check result
    $result = Services::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Services has been successfully created.');
        return redirect('admin/services');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'user'  => (array) Services::getUserById($id)
        ];
        return view('admin.services.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
                            'name' => 'required',
                            'description'=>'required',
                            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);
    // Call the model's update method
    $result = Services::updateAbout($request);

    if ($result === 1) {
        session()->flash('success', 'Services has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'Employee creation failed.');
        return redirect()->back();
    }

    return redirect('admin/services');


}

    
    public function delete($id){
        $result = Services::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Services deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
