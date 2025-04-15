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
                    <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog</a></li>
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
        <h3 class="card-title"><i class="fas fa-user-clock"></i> Edit Activity</h3>
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('blog.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form id="EditActivity" method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="id" value="{{ $user['id'] }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="date" id="date" data-target="#reservationdate"  value="{{ !empty($user) && !empty($user) ? date('d/m/Y', strtotime($user['date'])) : '' }}"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @if ($errors->has('date'))
                            <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Heading:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="heading" tabindex="2" class="form-control" value="{{ !empty($user['heading']) ? $user['heading'] : '' }}">
                        @if ($errors->has('heading'))
                          <span class="text-danger">{{ $errors->first('heading') }}</span>
                        @endif
                           
                        </div>
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Content:</label>
                        <div class="input-group date">
                            <input type="text" name="content" tabindex="2" class="form-control" value="{{ !empty($user['content']) ? $user['heading'] : '' }}">
                        @if ($errors->has('content'))
                          <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                           
                        </div>
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="customFile">Image 1(150x150)</label>
                    
                        <div id="photo_preview" class="mt-2">
                            @if(!empty($user) && !empty($user) && !empty($user['image']))
                                <img src="{{asset('uploads/blog/'.$user['image'])}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @else
                                <img src="{{asset('uploads/avatar.png')}}" alt="Employee Photo" style="width: 150px; height: 150px;">
                            @endif
                        </div><br>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" tabindex="7" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                            @if ($errors->has('image_1'))
                              <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

               <input type="hidden" name="image_1_old" value="{{ !empty($user) && !empty($user) ? $user['image'] : '' }}">
            </div>
           
            
        </div>
        <div class="card-footer" align="center">
            <button type="submit" id="submitBtn" tabindex="4" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Save</button>
            <button type="reset" value="Reset" id="resetbtn" tabindex="p" class="btn btn-secondary btn-flat"><i class="fas fa-undo-alt"></i> Reset</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
$(function () {
   
  
    $('#EditActivity').validate({
        rules: {
            project: {
                required: true,
            },
            date: {
                required: true,
            },
        },
        messages: {
            project: {
                required: "Please select the project",
            },
            date: {
                required: "Please select the date",
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
    $('#project').change(function() {
        var projectId = $(this).val();
        taskList(projectId, base_url, activityTasks);
    });
 
});

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
</script>

@endsection