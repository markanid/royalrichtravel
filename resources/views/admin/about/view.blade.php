@extends('admin.layout')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Employees</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-users"></i> Employee Details</h3>
        <div class="card-tools">
            <a class="btn btn-info btn-sm btn-flat" href="{{route('users.edit', $user->id)}}"><i class="fas fa-edit"></i> Edit</a>
            <a class="btn btn-dark btn-sm btn-flat" href="{{route('users.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        
        <div class="table-responsive col-md-6">
            <table class="table table-bordered" style="margin-bottom: 10px;">
                <tbody>
                    <tr>
                        <td style="background-color:#096ca5; color:#fff;">Employee Name</td>
                        <td><b style="color:#096ca5;">{{ $user->name }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
       </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="3">
                            <div>
                                @if(!empty($user) && !empty($user->employee_photo))
                                    <p><img src="{{asset('uploads/employees/'.$user->employee_photo)}}" alt="Employee Photo" style="width: 150px; height: 150px;"></p>
                                @else
                                    <p><img src="{{asset('uploads/employees/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;"></p>
                                @endif 
                            </div>
                        </td>
                        <td>
                            <span>Employee ID :</span>
                            <label>{{ $user->employee_id }}</label>
                        </td>
                        <td>
                            <span>Email ID :</span>
                            <label>{{ $user->email }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Designation :</span>
                            <label>{{ $user->designation }}</label>
                        </td>
                        <td colspan="2">
                            <span>User Type :</span>
                            <?php
                                if($user->is_admin == 1){
                                    $user_type = 'Admin';
                                } elseif($user->is_admin == 2){
                                    $user_type = 'Manager';
                                } else{
                                    $user_type = 'Employee';
                                } 
                            ?>
                            <label>{{ $user_type }}</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
    </div>
   
</div>
@endsection
