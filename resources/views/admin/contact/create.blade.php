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
                    <li class="breadcrumb-item"><a href="{{route('contact.index')}}">Contact</a></li>
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
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('contact.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="addUser" method="post" action="{{ route('contact.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" tabindex="2" class="form-control">
                        @if ($errors->has('phone'))
                          <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>

                   <div class="col-md-4">
                    <div class="form-group">
                        <label>Email </label>
                        <input type="text" name="email" tabindex="2" class="form-control">
                        @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                   <div class="col-md-4">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" tabindex="2" class="form-control">
                        @if ($errors->has('address'))
                          <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Map</label>
                        <input type="text" name="map" tabindex="2" class="form-control">
                        @if ($errors->has('map'))
                          <span class="text-danger">{{ $errors->first('map') }}</span>
                        @endif
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
        phone: {
            required: true
        },
        
        email: {
            required: true
        },
        
    },
    messages: {
        phone: {
            required: "Please enter a phone"
        },
        
        email: {
            required: "Please enter email"
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