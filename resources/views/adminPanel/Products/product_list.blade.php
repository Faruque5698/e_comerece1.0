@extends('adminPanel.master')



@section('title')
    Products
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products Details</h3>
                <a href="{{url('add-product')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Product Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->category->cat_name}}</td>
                            <td>{{$product->brand->brand_name}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{!!$product->product_description!!}</td>
                            <td><img src="{{$product->product_image}}" alt="{{$product->product_name}}" width="100px"></td>
                            <td>{{$product->status == 1 ? 'Published':'Unpublished'}}</td>
                            <td>
                                <a href="{{route('product_details',['id'=>$product->id])}}" class="btn btn-sm btn-dark"><i class="fa fa-search-plus"></i></a>

                                @if($product->status == 1)
                                    <a href="{{route('product_unpublished',['id'=>$product->id])}}" class="btn btn-sm btn-info"
                                       onclick="return confirm('Are you want to Unpublished it')"><i class="fa fa-arrow-circle-up"></i></a>
                                @else
                                    <a href="{{route('product_published',['id'=>$product->id])}}" class="btn btn-sm btn-warning"
                                       onclick="return confirm('Are you want to publish it')" ><i class="fa fa-arrow-circle-down"></i></a>
                                @endif

                                <a href="{{route('product_edit',['id'=>$product->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                <a href="{{route('product_delete',['id'=>$product->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Product Image</th>
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




