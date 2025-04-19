@extends('admin.layout')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
<!-- /.content-header -->
@section('body')       
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-users"></i> {{$title}}</h3>
                    <a class="btn btn-primary btn-sm btn-flat float-right" href="{{route('features.create')}}"><i class="fas fa-plus-circle"></i> Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach($features as $row)
                                <tr>
                                    <td>{{$i++;}}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm btn-flat" href="{{route('features.edit', $row->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm btn-flat delete-btn" data-url="{{ route('features.delete', ['id' => $row->id]) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        // var table = $("#user_table").DataTable({
        //     "responsive": true, "lengthChange": false, "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#user_table_wrapper .col-md-6:eq(0)');
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