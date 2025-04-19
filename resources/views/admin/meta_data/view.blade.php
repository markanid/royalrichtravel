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
                    <li class="breadcrumb-item"><a href="{{route('meta_data.index')}}">{{$page}}</a></li>
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
            <a href="{{ route('meta_data.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Create</a> &nbsp;
            <a href="{{ route('meta_data.edit', ['id' => $meta_data->id]) }}" class="btn btn-sm btn-info"> <i class="fas fa-pencil-alt"></i> Edit</a> &nbsp;
            <a href="#" class="btn btn-danger btn-sm btn-flat delete-btn" data-url="{{ route('meta_data.delete', ['id' => $meta_data->id]) }}"><i class="fas fa-trash"></i> Delete</a>
        </div> 
    </div>
    
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 10px;">
                    <tbody>
                        <tr>
                            <td style="background-color:#096ca5; color:#fff;">Meta Title</td>
                            <td><b style="color:#096ca5;">{{ !empty($meta_data->title) ? $meta_data->title : '' }}</b>
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
                                    @if(!empty($meta_data->og_image))
                                        <p><img src="{{asset('storage/meta_datas/'.$meta_data->og_image)}}" alt="OG Image" style="width: 200px; height: 100px;"></p>
                                    @else
                                        <p><img src="{{asset('uploads/default_company_logo.png')}}" alt="OG Image" style="width: 200px; height: 50px;"></p>
                                    @endif 
                                </div>
                            </td>
                            <td colspan="2">
                                <span>Description :</span>
                                <label>{{ !empty($meta_data->desciption) ? $meta_data->desciption : '' }}</label>
                            </td>
                            <td>
                                <span>Key Word :</span>
                                <label>{{ !empty($meta_data->keyword) ? $meta_data->keyword : '' }}</label>
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