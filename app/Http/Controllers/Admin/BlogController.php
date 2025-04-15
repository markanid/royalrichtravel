<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class BlogController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Blog',
            'about' => Blog::getAllUsers()
        ];
        return view('admin.blog.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'Blog'
        ];
        return view('admin.blog.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
                          'heading' => 'required',
                          'content'=>'required',
                          'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);

    // Save user and check result
    $result = Blog::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Blog has been successfully created.');
        return redirect('admin/blog');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'user'  => (array) Blog::getUserById($id)
        ];
        return view('admin.blog.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
                            'heading' => 'required',
                            'content'=>'required',
                            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);
    // Call the model's update method
    $result = Blog::updateAbout($request);

    if ($result === 1) {
        session()->flash('success', 'Blog has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'Blog creation failed.');
        return redirect()->back();
    }

    return redirect('admin/blog');


}

    
    public function delete($id){
        $result = Blog::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Blog deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
