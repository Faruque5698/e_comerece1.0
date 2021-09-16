
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
                    <form action="{{url('order_demo_save')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label >Product Name</label>
                                <input type="text" class="form-control " readonly  value="{{$products->product_name}}"  name="product_name" placeholder="Enter Product quantity">
                                <input type="hidden" class="form-control " readonly  value="{{$stock->id}}"  name="id" placeholder="Enter Product quantity">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control " readonly value="{{$stock->total_product_quantity}}" id="old_product"  name="" placeholder="Enter Product quantity">
                                <input type="hidden" class="form-control "  value="" id="new_product" name="total_product_quantity"  placeholder="Enter Product quantity">
                            </div>
                            <div class="form-group">
                                <label >New Order Product Quantity</label>
                                <input type="text" class="form-control "  value="" id="order" required name="order_product_quantity" onkeyup="calculation()" placeholder="Enter Product quantity">
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

        function calculation() {
            var n1=(document.getElementById('old_product').value);
            var n2=(document.getElementById('order').value);

            var n3=n1-n2;

            document.getElementById('new_product').value=n3;


        }




    </script>

@endsection


