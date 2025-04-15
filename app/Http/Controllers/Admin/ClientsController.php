<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class ClientsController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Clients',
            'page' => 'Clients',
            'about' => Clients::getAllUsers()
        ];
        return view('admin.clients.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'About'
        ];
        return view('admin.clients.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'client_name' => 'required',
        'client_image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);

    // Save user and check result
    $result = Clients::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Clients has been successfully created.');
        return redirect('admin/clients');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id){
        $data = [
            'title' => 'Edit',
            'user'  => (array) Clients::getUserById($id)
        ];


        return view('admin.clients.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
        'client_name' => 'required',
        'client_image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);
    // Call the model's update method
    $result = Clients::updateAbout($request);
    if ($result === 1) {
        session()->flash('success', 'clients has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'clients creation failed.');
        return redirect()->back();
    }

    return redirect('admin/clients');

}

    
    public function delete($id){
        $result = Clients::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Clients deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
