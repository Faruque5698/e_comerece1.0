
@extends('adminPanel.master')



@section('title')
    Add Stock
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Stock</h3>
                </div>
                @if(Session::get('message'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        @endif

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('save-stock')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label >Product Name</label>
                                <select class="form-control productStock" name="product_id" id="product_id">
                                    <option >---Select Product---</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Total Product Quantity</label>
                                <input type="text" class="form-control total_product_quantity" readonly  name="total_product_quantity" placeholder="Enter Product quantity">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label >order Product Quantity</label>--}}
{{--                                <input type="text" class="form-control"  name="order_product_quantity" placeholder="Enter Product quantity">--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label >Stock Product</label>--}}
{{--                                <input type="text" class="form-control"  name="stock_product" placeholder="Enter Product quantity">--}}
{{--                            </div>--}}

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">New Product Stock</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </section>




@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change','.productStock',function () {
                var product_id = $(this).val();

                var a = $(this).parent();
                console.log(product_id);

                var op = "";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findPrice')!!}',
                    data:{'id':product_id},
                    dataType:'json',
                    success:function (data) {
                        console.log("product_quantity");
                        console.log(data.product_quantity);

                        $('.total_product_quantity').val(data.product_quantity);

                    },
                    error:function () {

                    }
                });
            })
        });
                // console.log('hmm its change')



    </script>

@endsection


