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
                    <li class="breadcrumb-item"><a href="{{route('about.index')}}">{{$page}}</a></li>
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
            <a href="{{ route('about.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Create</a> &nbsp;
            <a href="{{ route('about.edit', ['id' => $about->id]) }}" class="btn btn-sm btn-info"> <i class="fas fa-pencil-alt"></i> Edit</a> &nbsp;
            <a href="#" class="btn btn-danger btn-sm btn-flat delete-btn" data-url="{{ route('about.delete', ['id' => $about->id]) }}"><i class="fas fa-trash"></i> Delete</a>
        </div> 
    </div>
    
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 10px;">
                    <tbody>
                        <tr>
                            <td style="background-color:#096ca5; color:#fff;">Welcome Message</td>
                            <td><b style="color:#096ca5;">{{ !empty($about->welcome) ? $about->welcome : '' }}</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    @if(!empty($about->image))
                                        <p><img src="{{asset('storage/abouts/'.$about->image)}}" alt="About Image" style="width: 200px; height: 100px;"></p>
                                    @else
                                        <p><img src="{{asset('uploads/default_company_logo.png')}}" alt="OG Image" style="width: 200px; height: 50px;"></p>
                                    @endif 
                                </div>
                            </td>
                            <td colspan="2">
                                <span>Glimbse :</span>
                                <label>{{ !empty($about->glimbse) ? $about->glimbse : '' }}</label>
                            </td>
                            <td>
                                <span>Our Journey :</span>
                                <label>{{ !empty($about->our_journey) ? $about->our_journey : '' }}</label>
                            </td>
                            <td>
                                <span>Vision :</span>
                                <label>{{ !empty($about->vision) ? $about->vision : '' }}</label>
                            </td>
                            <td>
                                <span>Mission :</span>
                                <label>{{ !empty($about->mission) ? $about->mission : '' }}</label>
                            </td>
                            <td>
                                <span>Our Values :</span>
                                <label>{{ !empty($about->our_values) ? $about->our_values : '' }}</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
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