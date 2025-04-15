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
                    <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clients</a></li>
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
        <h3 class="card-title">Edit Clients</h3>
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('clients.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="EditUser" method="post" action="{{ route('clients.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="id" value="{{ $user['id'] }}">
         
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="client_name" id="id" tabindex="1" class="form-control" value="{{ !empty($user['client_name']) ? $user['client_name'] : '' }}">

                        @if ($errors->has('client_name'))
                          <span class="text-danger">{{ $errors->first('client_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
					<div class="form-group">
						<label for="customFile">Image 1(150x150)</label>
					
						<div id="photo_preview" class="mt-2">
						    @if(!empty($user) && !empty($user) && !empty($user['client_image']))
						        <img src="{{asset('uploads/clients/'.$user['client_image'])}}" alt="Employee Photo" style="width: 150px; height: 150px;">
						    @else
                                <img src="{{asset('uploads/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @endif
                        </div><br>
                        	<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" tabindex="7" name="client_image">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							
							@if ($errors->has('image_1'))
                              <span class="text-danger">{{ $errors->first('client_image') }}</span>
                            @endif
						</div>
					</div>
				</div>

                
				<input type="hidden" name="image_1_old" value="{{ !empty($user) && !empty($user) ? $user['client_image'] : '' }}">
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