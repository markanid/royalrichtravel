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
                    <a class="btn btn-primary btn-sm btn-flat float-right" href="{{route('testimonial.add')}}"><i class="fas fa-plus-circle"></i> Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Designation </th>
                                <th>Message </th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach($about as $row)
                                <tr>
                                    <td>{{$i++;}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->designation}}</td>
                                    <td>{{$row->message }}</td>
                                    <td>  
                                     <img src="{{ $row->image ? asset('uploads/testimonial/' . $row->image) : asset('uploads/avatar.png') }}" width="100" height="70" alt="Description Image">
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm btn-flat" href="{{route('testimonial.edit', $row->id)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm delete-btn btn-flat" data-id="{{$row->id}}" data-toggle="modal" data-target="#modal-sm">
                                             <i class="fas fa-trash-alt"></i>
                                        </button>
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
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Delete ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="delete_btn">Yes</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
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
        // var table = $("#user_table").DataTable({
        //     "responsive": true, "lengthChange": false, "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#user_table_wrapper .col-md-6:eq(0)');
        
        $('#user_table').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            $('#delete_btn').data('id', id);
        });

        $("#delete_btn").on('click', function() {
            var id = $(this).data('id');
        
            $.ajax({
                url: 'testimonial/delete/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#modal-sm').modal('hide');
                    $('#user_table').DataTable().row($(`button[data-id="${id}"]`).closest('tr')).remove().draw();
                    Toast.fire({
                        icon: 'success',
                        title: 'Testimonial has been deleted successfully.'
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while trying to delete the Employee.'
                    });
                }
            });
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