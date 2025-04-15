<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class ContactController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Contact',
            'about' => Contact::getAllUsers()
        ];
        return view('admin.contact.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'Blog'
        ];
        return view('admin.contact.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
                          'phone' => 'required',
                          'email'=>'required',
                           
                      ]);

    // Save user and check result
    $result = Contact::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Contact has been successfully created.');
        return redirect('admin/contact');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'user'  => (array) Contact::getUserById($id)
        ];
        return view('admin.contact.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
                            'phone' => 'required',
                            'email'=>'required',
                            
                      ]);
    // Call the model's update method
    $result = Contact::updateAbout($request);

    if ($result === 1) {
        session()->flash('success', 'Contact has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'Contact creation failed.');
        return redirect()->back();
    }

    return redirect('admin/contact');


}

    
    public function delete($id){
        $result = Contact::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Contact deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
