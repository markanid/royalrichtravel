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
        <h3 class="card-title">Edit Employee</h3>
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('users.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="EditUser" method="post" action="{{ route('users.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="user_id" name="user_id" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->id : '' }}">
        <input type="hidden" id="old_password" name="old_password" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->password : '' }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" id="id" tabindex="1" class="form-control" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->employee_id : '' }}">
                        @if ($errors->has('id'))
                          <span class="text-danger">{{ $errors->first('id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" tabindex="2" class="form-control" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->name : '' }}">
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" id="designation" tabindex="3" class="form-control" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->designation : '' }}">
                        @if ($errors->has('designation'))
                          <span class="text-danger">{{ $errors->first('designation') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="email" name="email" id="email" tabindex="4" class="form-control" autocomplete="off" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->email : '' }}">
                        @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" id="password" tabindex="5" class="form-control" autocomplete="off">
                        @if ($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label>User Type</label>
                        <select name="is_admin" id="is_admin" tabindex="6" class="form-control">
                            <option value="1" {{ !empty($user) && !empty($user[0]) && $user[0]->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ !empty($user) && !empty($user[0]) && $user[0]->is_admin == 2 ? 'selected' : '' }}>Manager</option>
                            <option value="0" {{ !empty($user) && !empty($user[0]) && $user[0]->is_admin == 0 ? 'selected' : '' }}>Employee</option>
                        </select>
                        @if ($errors->has('is_admin'))
                          <span class="text-danger">{{ $errors->first('is_admin') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
					<div class="form-group">
						<label for="customFile">Employee Photo(150x150)</label>
					
						<div id="photo_preview" class="mt-2">
						    @if(!empty($user) && !empty($user[0]) && !empty($user[0]->employee_photo))
						        <img src="{{asset('uploads/employees/'.$user[0]->employee_photo)}}" alt="Employee Photo" style="width: 150px; height: 150px;">
						    @else
                                <img src="{{asset('uploads/employees/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @endif
                        </div><br>
                        	<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" tabindex="7" name="employee_photo">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							
							@if ($errors->has('employee_photo'))
                              <span class="text-danger">{{ $errors->first('employee_photo') }}</span>
                            @endif
						</div>
					</div>
				</div>
				<input type="hidden" name="old_photo" value="{{ !empty($user) && !empty($user[0]) ? $user[0]->employee_photo : '' }}">
            </div>
        </div>
        <div class="card-footer" align="center">
            <button type="submit" id="submitBtn" tabindex="8" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Save</button>
             <button type="reset" value="Reset" id="resetbtn" tabindex="p" class="btn btn-secondary  btn-flat"><i class="fas fa-undo-alt"></i> Reset</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
$(function () {
    bsCustomFileInput.init();
    $('#customFile').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photo_preview').html('<img src="' + e.target.result + '" alt="Employee Photo" style="width: 150px; height: 150px;">');
            }
            reader.readAsDataURL(file);
        }
    });
    $.validator.setDefaults({
        submitHandler: function (form) {
            $('#submitBtn').prop('disabled', true); // Disable the submit button
            form.submit();
        }
    });
  
    $('#EditUser').validate({
        rules: {
            id: {
                required: true,
            },
            name: {
                required: true,
            },
            designation: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            name: {
                required: "Please enter a Name",
            },
            id: {
                required: "Please enter a Employee ID",
            },
            designation: {
                required: "Please enter a designation",
            },
            email: {
                required: "Please enter a Email",
                email: "Please enter a valid email address"
            },       
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endsection