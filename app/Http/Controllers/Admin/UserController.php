<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\UserHandler\UserHandler;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    public function index(){    
        $usersHandler = new UserHandler();
        $users = $usersHandler->getAllUsers();
        $data = [
            'title' => 'Employees',
            'users' => $users
        ];
        return view('admin.users.index', $data);
    }

    public function add(){
        $data = [
            'title' => 'Add'
        ];
        return view('admin.users.create', $data);
    }

    public function save(Request $request){
        $usersHandler = new UserHandler();
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,' . $request->id,
            'password'          => 'required',
            'id'                => 'required|unique:users,employee_id,' . $request->id,
            'designation'       => 'required',
            'employee_photo'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $arr = [];
        $arr['name']        = ($request->has('name') && $request->post('name') != '') ? $request->post('name') : '';
        $arr['email']       = ($request->has('email') && $request->post('email') != '') ? $request->post('email') : '';
        $arr['password']    = ($request->has('password') && $request->post('password') != '') ? $request->post('password') : '';
        $arr['is_admin']    = ($request->has('is_admin') && $request->post('is_admin') != '') ? $request->post('is_admin') : '';
        $arr['employee_id'] = ($request->has('id') && $request->post('id') != '') ? $request->post('id') : '';
        $arr['designation'] = ($request->has('designation') && $request->post('designation') != '') ? $request->post('designation') : '';
        if ($request->hasFile('employee_photo')) {
            $file       = $request->file('employee_photo');
            $filename   = $arr['employee_id'] . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/employees'), $filename);
            $arr['employee_photo'] = $filename;
        }
        $result         = $usersHandler->saveUser($arr);
        if($result > 0){
            session()->flash('success', 'Employee has been successfully created.');
            return redirect('admin/users');
        } else {
            return redirect()->back()->with('error', 'Employee creation failed.');
        }
    }

    public function edit($user_id){
        $usersHandler = new UserHandler();
        $user = $usersHandler->getUserById($user_id);
        $data = [
            'title' => 'Edit',
            'user'  =>  $user
        ];
        return view('admin.users.edit', $data);
    }

    public function update(Request $request){
        $usersHandler = new UserHandler();
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|email',
            'id'                => 'required',
            'designation'       => 'required',
            'employee_photo'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
         
        $arr = [];
        if($request->has('user_id') && $request->post('user_id') != ''){
            $user_id                = $request->post('user_id');
            $arr['name']            = ($request->has('name') && $request->post('name') != '') ? $request->post('name') : '';
            $arr['email']           = ($request->has('email') && $request->post('email') != '') ? $request->post('email') : '';
            $arr['password']        = ($request->has('password') && $request->post('password') != '') ? Hash::make($request->post('password')) : $request->post('old_password');
            $arr['is_admin']        = ($request->has('is_admin') && $request->post('is_admin') != '') ? $request->post('is_admin') : '';
            $arr['employee_id']     = ($request->has('id') && $request->post('id') != '') ? $request->post('id') : '';
            $arr['designation']     = ($request->has('designation') && $request->post('designation') != '') ? $request->post('designation') : '';
            $arr['remember_token']  = Str::random(60);
            
            if ($request->hasFile('employee_photo')) {
                // Delete old photo if exists
                if ($request->post('old_photo') && file_exists(public_path('uploads/employees/' . $request->post('old_photo')))) {
                    unlink(public_path('uploads/employees/' . $request->post('old_photo')));
                }
                
                $file = $request->file('employee_photo');
                $filename = $arr['employee_id'] . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/employees'), $filename);
                $arr['employee_photo'] = $filename;
        
            } else {
                $arr['employee_photo'] = $request->post('old_photo');
            }
             
            $result = $usersHandler->updateUser($arr, $user_id);
            if ($result > 0) {
                session()->flash('success', 'Employee has been successfully updated.');
            } else {
                session()->flash('info', 'No changes were made.');
            }
            return redirect('admin/users');
        } else{
            return redirect()->back()->with('error', 'Invalid user ID.');
        }
    }

    public function view($user_id) {
        $usersHandler = new UserHandler();
        $user = $usersHandler->getUser($user_id);
        $title = 'View User';
        return view('admin.users.view', compact('user', 'title'));
    }

    public function delete($user_id){
        $usersHandler = new UserHandler();
        $result = $usersHandler->deleteUser($user_id);
        if($result) {
            return response()->json(['success' => 'Employee deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete employee'], 500);
        }
    }
    
    public function load_data_ajax(Request $request){
        $usersHandler = new UserHandler();
        $users = $usersHandler->getAllUsers();

        return DataTables::of($users)
            ->addColumn('action', function($user) {
            return '<td class="project-actions">
                        <a class="btn btn-primary btn-sm" href="'.route('users.view', $user->id).'">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" href="'.route('users.edit', $user->id).'">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="'.$user->id.'" data-toggle="modal" data-target="#modal-sm">
                             <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>';
        })
        ->rawColumns(['action'])
        ->toJson();
    }
}
