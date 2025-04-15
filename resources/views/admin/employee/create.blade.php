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
        <h3 class="card-title"><i class="fas fa-users"></i> Create {{$page}}</h3>
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('employee.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="addUser" method="post" action="{{ route('employee.save') }}">
        @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Employee name</label>
                        <input type="text" name="employee_name" id="name" tabindex="2" class="form-control">
                        @if ($errors->has('employee_name'))
                          <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" tabindex="2" class="form-control">
                        @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>mobile </label>
                        <input type="number" name="mobile" tabindex="2" class="form-control">
                        @if ($errors->has('mobile '))
                          <span class="text-danger">{{ $errors->first('mobile ') }}</span>
                        @endif
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date of join</label>
                        <input type="date" name="date_join" tabindex="2" class="form-control">
                        @if ($errors->has('date_join'))
                          <span class="text-danger">{{ $errors->first('date_join') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Role</label>
                       

                        <select class="form-control" name="role">
                            <option value=""> --select--</option>
                            <option value="Manager"> Manager</option>
                            <option value="Recuiter">Recuiter</option>
                            <option value="Counselor">Counselor</option>
                            <option value="Accountant"> Accountant</option>
                        </select>
                       <!--  @if ($errors->has('phone'))
                          <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif -->
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Department</label>
                         <select class="form-control" name="department">
                            <option value=""> --select--</option>
                            <option value="Operations"> Operations</option>
                            <option value="Hr">Hr</option>
                            <option value="Sales">Sales</option>
                            <option value="Finance"> Finance</option>
                        </select>
                    </div>
                </div>

               
                
               
 
                
            </div>
        </div>
        <div class="card-footer" align="center">
            <button type="submit" id="submitBtn" tabindex="8" class="btn btn-primary  btn-flat"><i class="fas fa-save"></i> Save</button>
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
  
    $('#addUser').validate({
        rules: {
            
            description: {required: true,},
            project_complete: {required: true,},
           
        },
        messages: {
            description: {required: "Please enter a description",},
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

 
<script type="text/javascript">
$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
$('#datepicker').datepicker({
minDate: new Date(currentYear, currentMonth, currentDate)
});
});
</script>
@endsection