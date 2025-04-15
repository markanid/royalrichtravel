<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use DataTables;

class EmployeeController extends Controller
{
    public function index(){    

        $data = [
            'title' => 'Employee',
            'page' => 'employee',
            'employee' => Employee::getAllUsers()
        ];
        return view('admin.employee.index', $data);
    }


     public function export() 

    {

        return Excel::download(new Employee, 'users.xlsx');

    }

    public function import(Request $request)
{
    $file = $request->file('file');
    $fileContents = file($file->getPathname());

    foreach ($fileContents as $line) {
        $data = str_getcsv($line);

        Employee::create([
            'employee_name' => $data[0],
             
             
        ]);
    }

    return redirect()->back()->with('success', 'CSV file imported successfully.');
}


 

    public function add(){
        $data = [
            'title' => 'Add',
            'page'=>'About'
        ];
        return view('admin.employee.create', $data);
    }

     public function save(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'employee_name' => 'required',
        
    ]);

    // Save user and check result
    $result = Employee::saveUser($request); // Assuming `saveUser` method handles the actual saving

    if ($result) { // Assuming saveUser() returns a model instance on success
        session()->flash('success', 'employee has been successfully created.');
        return redirect('admin/employee');
    } else {
        return redirect()->back()->with('error', 'employee creation failed.');
    }
}


    public function edit($id){
        $data = [
            'title' => 'Edit',
            'user'  => (array) Employee::getUserById($id)
        ];


        return view('admin.employee.edit', $data);
    }

   public function update(Request $request)
{
    // Gather data to send to the model

    $request->validate([
        'employee_name' => 'required',
       
    ]);
    // Call the model's update method
    $result = Employee::updateAbout($request);
    if ($result === 1) {
        session()->flash('success', 'employee has been successfully Updated.');
    } elseif ($result === 0) {
        session()->flash('info', 'No changes were made.');
    } else {
        session()->flash('error', 'employee creation failed.');
        return redirect()->back();
    }

    return redirect('admin/employee');

}

    
    public function delete($id){
        $result = Employee::deleteUser($id); 
        if($result) {
            return response()->json(['success' => 'employee deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
   
}
