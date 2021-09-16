@extends('adminPanel.master')



@section('title')
    Admin List
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin List</h3>
                <a href="{{url('Admin-registration')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{asset($user->image)}}" alt="{{$user->name}}" width="100"></td>
                            <td>

                                <a href="{{route('admin_profile_edit',['id' => $user->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                @if($LoggedUserInfo->id == $user->id)
                                    <a href="" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>
                                @else
                                    <a href="{{route('admin_profile_delete',['id' => $user->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>

                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


@endsection


@section('js')
    <script src="{{asset('/admin/admin')}}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('/admin/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>


@endsection
