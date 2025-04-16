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
                    <li class="breadcrumb-item"><a href="{{route('banner.index')}}">Banners</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-users"></i> View {{$page}}</h3>  
        <div class="ml-auto"> 
            <a href="{{ route('banner.index') }}" class="btn btn-sm btn-dark"> <i class="fa fa-arrow-circle-left"></i> Back</a> &nbsp;
            <a href="{{ route('banner.edit', ['id' => $banners->id]) }}" class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i> Edit</a> &nbsp;
            <a href="#" class="btn btn-danger btn-sm btn-flat delete-btn" data-url="{{ route('banner.delete', ['id' => $banners->id]) }}"><i class="fas fa-trash"></i> Delete</a>
        </div> 
    </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                	<div class="form-group">
    					<label for="customFile">Image(150x150)</label>
    					<div id="photo_preview2" class="mt-2">
                            @php
                                $images = is_array($banners->banner) ? $banners->banner : json_decode($banners->banner, true);
                            @endphp
                            @if($images)
                                @foreach($images as $img)
                                    <img src="{{ asset('storage/banners/' . $img) }}" style="width: 100%; height: 350px; margin: 5px;">
                                @endforeach
                            @endif
                        </div><br>    					
    				</div>
               </div>

            </div>
        </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            let deleteUrl = this.getAttribute('data-url');

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
});
</script>
<script>
    $(document).ready(function(){
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
        // Check for the flash message and display the SweetAlert2 popup
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
        @if(session('info'))
            Toast.fire({
                icon: 'info',
                title: '{{ session('info') }}'
            });
        @endif
    });
</script>
@endsection