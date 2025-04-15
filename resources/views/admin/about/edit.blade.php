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
                    <li class="breadcrumb-item"><a href="{{route('about.index')}}">About</a></li>
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
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('about.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="EditUser" method="post" action="{{ route('about.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="id" value="{{ $user['about_id'] }}">
         
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="id" tabindex="1" class="form-control" value="{{ !empty($user['description']) ? $user['description'] : '' }}">

                        @if ($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>project complete</label>
                        <input type="text" name="project_complete" id="id" tabindex="1" class="form-control" value="{{ !empty($user['project_complete']) ? $user['project_complete'] : '' }}">

                        @if ($errors->has('project_complete'))
                          <span class="text-danger">{{ $errors->first('project_complete') }}</span>
                        @endif
                    </div>
                </div>
                 
                
                <div class="col-md-4">
					<div class="form-group">
						<label for="customFile">Image 1(150x150)</label>
					
						<div id="photo_preview" class="mt-2">
						    @if(!empty($user) && !empty($user) && !empty($user['image_1']))
						        <img src="{{asset('uploads/about/'.$user['image_1'])}}" alt="Employee Photo" style="width: 150px; height: 150px;">
						    @else
                                <img src="{{asset('uploads/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @endif
                        </div><br>
                        	<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" tabindex="7" name="image_1">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
							
							@if ($errors->has('image_1'))
                              <span class="text-danger">{{ $errors->first('image_1') }}</span>
                            @endif
						</div>
					</div>
				</div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="customFile">Image 2(150x150)</label>
                    
                        <div id="photo_preview2" class="mt-2">
                            @if(!empty($user) && !empty($user ) && !empty($user['image_2']))
                                <img src="{{asset('uploads/about/'.$user['image_2'])}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @else
                                <img src="{{asset('uploads/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @endif
                        </div><br>
                            <div class="input-group">
                            <div class="custom-file2">
                                <input type="file" class="custom-file-input" id="customFile2" tabindex="7" name="image_2">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                            @if ($errors->has('image_2'))
                              <span class="text-danger">{{ $errors->first('image_2') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
				<input type="hidden" name="image_1_old" value="{{ !empty($user) && !empty($user) ? $user['image_1'] : '' }}">
                <input type="hidden" name="image_2_old" value="{{ !empty($user) && !empty($user) ? $user['image_2'] : '' }}">
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