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
                    <li class="breadcrumb-item"><a href="{{route('employee.index')}}">About</a></li>
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
        <h3 class="card-title">Edit About</h3>
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('employee.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="EditUser" method="post" action="{{ route('employee.update') }}" >
        @csrf
        <input type="hidden"  name="id" value="{{ $user['id'] }}">
         
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Employee name</label>
                        <input type="text" name="employee_name" id="id" tabindex="1" class="form-control" value="{{ !empty($user['employee_name']) ? $user['employee_name'] : '' }}">

                        @if ($errors->has('employee_name'))
                          <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                        @endif
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" name="email" class="form-control" value="{{ !empty($user['email']) ? $user['email'] : '' }}">

                        @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>mobile</label>
                        <input type="text" name="mobile" class="form-control" value="{{ !empty($user['mobile']) ? $user['mobile'] : '' }}">

                        @if ($errors->has('mobile'))
                          <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        @endif
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label>date_join</label>
                        <input type="text" name="date_join" class="form-control" value="{{ !empty($user['date_join']) ? $user['date_join'] : '' }}">

                        @if ($errors->has('date_join'))
                          <span class="text-danger">{{ $errors->first('date_join') }}</span>
                        @endif
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label>role</label>

                        <select class="form-control" name="role">
                            <option value=""> --select--</option>
                            <option value="Manager"  <?php  if($user['role']=='Manager' ) echo "selected";?>> Manager</option>
                            <option value="Recuiter"  <?php  if($user['role']=='Recuiter' ) echo "selected";?>>Recuiter</option>
                            <option value="Counselor"  <?php  if($user['role']=='Counselor' ) echo "selected";?>>Counselor</option>
                            <option value="Accountant"  <?php  if($user['role']=='Accountant' ) echo "selected";?>> Accountant</option>
                        </select>
                        
                    </div>
                </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Department</label>

                        <select class="form-control" name="department">
                            <option value=""> --select--</option>
                            <option value="Operations" <?php  if($user['department']=='Operations' ) echo "selected";?>>Operations</option>
                            <option value="Hr" <?php  if($user['department']=='Recuiter' ) echo "selected";?>>Hr</option>
                            <option value="Sales"  <?php  if($user['department']=='Sales' ) echo "selected";?>>Sales</option>
                            <option value="Finance"  <?php  if($user['department']=='Finance' ) echo "selected";?>> Finance</option>
                        </select>
                        
                    </div>
                </div>
 
                 
                 
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

     $('#customFile2').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        
        var file = this.files[0];
        if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#photo_preview2').html('<img src="' + e.target.result + '" alt="Employee Photo" style="width: 150px; height: 150px;">');
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
            description: {required: true,},
            project_complete: {required: true,},
        },
        messages: {
            description: {required: "Please enter a Description",},
            project_complete: {required: "Please enter a project complete",},
                  
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