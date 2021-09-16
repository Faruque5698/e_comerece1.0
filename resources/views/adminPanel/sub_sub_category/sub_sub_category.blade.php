@extends('adminPanel.master')


@section('title')
    Sub Category
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sub Category Details</h3>
                <a href="{{url('sub_sub_category/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Sub Category name</th>
                        <th>Sub Sub Category name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($sub_sub_categories as $sub_sub_category)

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$sub_sub_category->sub_category->sub_cat_name}}</td>
                            <td>{{$sub_sub_category->sub_sub_cat_name}}</td>

                            <td>{{$sub_sub_category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($sub_sub_category->status == 1)
                                    <a href="{{route('unpublished_sub_sub_category',['id' => $sub_sub_category->id])}}" class="btn btn-sm btn-info"
                                       onclick="return confirm('Are you want to Unpublished it')"><i class="fa fa-arrow-circle-up"></i></a>
                                @else
                                    <a href="{{route('published_sub_sub_category',['id' => $sub_sub_category->id])}}" class="btn btn-sm btn-warning"
                                       onclick="return confirm('Are you want to publish it')" ><i class="fa fa-arrow-circle-down"></i></a>
                                @endif

                                <a href="{{route('sub_sub_category-edit',['id' => $sub_sub_category->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

{{--                                <a href="{{route('delete-sub_sub_category',['id' => $sub_sub_category->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Category name</th>
                        <th>Sub Category name</th>
                        <th>Status</th>
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




