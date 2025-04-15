<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class PortfolioController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Portfolio',
            'about' => Portfolio::getAllUsers()
        ];
        return view('admin.portfolio.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'Services'
        ];
        return view('admin.portfolio.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
                        'name' => 'required',
                         'category' => 'required',
                        'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);

    // Save user and check result
    $result = Portfolio::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'Portfolio has been successfully created.');
        return redirect('admin/portfolio');
    } else {
        return redirect()->back()->with('error', 'About creation failed.');
    }
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'user'  => (array) Portfolio::getUserById($id)
        ];
        return view('admin.portfolio.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
                            'name' => 'required',
                            'category'=>'required',
                            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
                      ]);
    // Call the model's update method
    $result = Portfolio::updateAbout($request);

    if ($result === 1) {
        session()->flash('success', 'Portfolio has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'Portfolio creation failed.');
        return redirect()->back();
    }

    return redirect('admin/portfolio');


}

    
    public function delete($id){
        $result = Portfolio::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'Portfolio deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete Portfolio'], 500);
        }
    }
    
   
}
