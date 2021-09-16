@extends('FrontEnd.master')

@section('body')
    <div class="col-sm-9 padding-right">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-header">
                <h1>Cart List</h1>
            </div>
            <div class="card-body">
                <table class="table tab-pane">
                        <tr>
                            <th><h3>Product Image</h3></th>
                            <th><h3>Product Name</h3></th>
                            <th><h3>Product Price</h3></th>
                            <th><h3>Product Total Price</h3></th>
                            <th><h3>Product Quantity</h3></th>
                            <th><h3>Action</h3></th>
                        </tr>

                        @php $total = 0; @endphp
                    @foreach($products as $product)

                        <tr>
                            <td><img src="{{asset($product->product_image)}}" width="100px" height="100px" alt=""></td>
                            <td>
                                <h4>{{$product->product_name}}</h4>
                                <input type="hidden" name="product_id" >
                            </td>
                            <td>{{$product->product_price}}</td>
                            <td id="">{{$product->price}}</td>
{{--                            <input type="hiddne" class="price_count"id="qty" value="{{$product->price}}">--}}
                            <td>{{$product->quanity}}</td>
                            <td><a href="{{route('remove_cart',['id' => $product->cartId])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')">Remove to Cart</a></td>
                        </tr>


                        @php $total = $total + $product->price;  @endphp

                    @endforeach


                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <td class=""><h4>Total Price = {{$total}}</h4></td>
                <td><a href="{{url('order')}}" class="bt btn-success left" >Order</a></td>
            </div>
        </div>
    </div>
    @endsection

@section('js')
    <script>











    </script>
    @endsection



