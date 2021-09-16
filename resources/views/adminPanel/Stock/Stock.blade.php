
@extends('adminPanel.master')



@section('title')
    Stock Manager
@endsection

@section('body')

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Stock Manager</h3>
                <a href="{{url('add-stock')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Total Product Quantity</th>
                        <th>Order Product Quantity</th>
{{--                        <th>Stock Product</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($stocks as $stock)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$stock->product_id}}</td>
                            <td>{{$stock->products->product_name}}</td>
                            <td>{{$stock->total_product_quantity}}</td>
                            <td>{{$stock->order_product_quantity}}</td>
{{--                            <td>{{$stock->stock_product}}</td>--}}

                           <td>
                               <a href="{{route('order_demo',['product_id' => $stock->product_id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>

                               <a href="{{route('delete_stock',['id' => $stock->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
                           </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Total Product Quantity</th>
                        <th>Order Product Quantity</th>
{{--                        <th>Stock Product</th>--}}
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




