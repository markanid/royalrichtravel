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
                    <li class="breadcrumb-item"><a href="{{route('packages.index')}}">{{$page}}</a></li>
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
            <a href="{{ route('packages.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Create</a> &nbsp;
            <a href="{{ route('packages.edit', ['id' => $package->id]) }}" class="btn btn-sm btn-info"> <i class="fas fa-pencil-alt"></i> Edit</a> &nbsp;
            <a href="{{ route('packages.index') }}" class="btn btn-sm btn-dark"> <i class="fa fa-arrow-circle-left"></i> Back</a> &nbsp;
        </div> 
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered" style="margin-bottom: 10px;">
                <tbody>
                    <tr>
                        <td style="background-color:#096ca5; color:#fff;">Service Name</td>
                        <td><b style="color:#096ca5;">{{ $package->name }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
       </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="3">
                            <div>
                                @if(!empty($package) && !empty($package->image))
                                    <p><img src="{{asset('storage/packages/'.$package->image)}}" alt="Packages Photo" style="width: 150px; height: 150px;"></p>
                                @else
                                    <p><img src="{{asset('uploads/employees/avatar.png')}}" alt="Packages Photo" style="width: 150px; height: 150px;"></p>
                                @endif 
                            </div>
                        </td>
                        <td>
                            <span>Description :</span>
                            <label>{{ $package->description }}</label>
                        </td>
                        <td>
                            <span>Location :</span>
                            <label>{{ $package->location }}</label>
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