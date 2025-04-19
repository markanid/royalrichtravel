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
                    <li class="breadcrumb-item"><a href="{{route('contact.index')}}">{{$page}}</a></li>
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
            <!--<a href="{{ route('contact.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Create</a> &nbsp;-->
            <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-sm btn-info"> <i class="fas fa-pencil-alt"></i> Edit</a> &nbsp;
            <a href="#" class="btn btn-danger btn-sm btn-flat delete-btn" data-url="{{ route('contact.delete', ['id' => $contact->id]) }}"><i class="fas fa-trash"></i> Delete</a>
        </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <span>Phone numbers :</span>
                            @foreach (json_decode($contact->phones ?? '[]') as $phone)
                                <label class="d-block">{{ $phone }}</label>
                            @endforeach
                        </td>
                        <td>
                            <span>Address :</span>
                            @foreach (json_decode($contact->addresses ?? '[]') as $address)
                                <label class="d-block">{{ $address }}</label>
                            @endforeach
                        </td>
                        <td>
                            <span>Location Map :</span>
                            <label><iframe src="{{ $contact->locations }}"></iframe></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Email ID :</span>
                            <label>{{ $contact->email }}</label>
                        </td>
                        <td>
                            <span>Facebook :</span>
                            <label>{{ $contact->facebook }}</label>
                        </td>
                        <td>
                            <span>Instagram :</span>
                            <label>{{ $contact->instagram }}</label>
                        </td>
                        <td>
                            <span>Youtube :</span>
                            <label>{{ $contact->youtube }}</label>
                        </td>
                        <td>
                            <span>X [Twiter] :</span>
                            <label>{{ $contact->x }}</label>
                        </td>
                    </tr>
                </tbody>
            </table>
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