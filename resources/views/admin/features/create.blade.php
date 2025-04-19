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
                    <li class="breadcrumb-item"><a href="{{route('features.index')}}">{{$page}}</a></li>
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
        <a class="btn btn-dark btn-sm btn-flat float-right" href="{{route('features.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
    </div>
    <form method="post" action="{{ route('features.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $feature->id ?? '' }}">
        <div class="card-body">
            <div class="row">                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" tabindex="1" class="form-control" value="{{ !empty($feature->name) ? $feature->name : '' }}">
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer" align="center">
            <button type="submit" id="submitBtn" tabindex="2" class="btn btn-primary  btn-flat"><i class="fas fa-save"></i> Save</button>
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
        let previewContainer = $('#photo_preview2');
        previewContainer.html('');

        Array.from(this.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = function (e) {
                previewContainer.append(
                    `<img src="${e.target.result}" style="width: 150px; height: 150px; margin: 5px;">`
                );
            }
            reader.readAsDataURL(file);
        });

        let fileName = Array.from(this.files).map(f => f.name).join(', ');
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
    });
    
    $.validator.setDefaults({
        submitHandler: function (form) {
            $('#submitBtn').prop('disabled', true); // Disable the submit button
            form.submit();
        }
    });

    $('#bannerForm').validate({
        rules: {},
        messages: {},
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endsection