@extends('adminPanel.master')
)


@section('title')
    Product Details
@endsection

@section('body')

    <section class="content">

        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->product_name}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td>{{$product->category->cat_name}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>
                        <td>{{$product->brand->brand_name}}</td>
                    </tr>
                    <tr>
                        <th>Product Description</th>
                        <td>{!!$product->product_description!!}</td>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <td>{{$product->product_quantity}}</td>
                    </tr>
                    <tr>
                        <th>Product Price</th>
                        <td>{{$product->product_price}}</td>
                    </tr><tr>
                        <th>Product Discount</th>
                        <td>{{$product->product_discount}}{{$product->product_discount_type}}</td>
                    </tr>
                    <tr>
                        <th>Product Discount Price</th>
                        <td>{{$product->product_discount_price}}</td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td><img src="{{asset($product->product_image)}}" alt="{{$product->product_name}}" width="300px"></td>
                    </tr>

                    <tr>
                        <th>Product Gallery Image</th>

                        <td>
                            @foreach($product->productGallery as $gallery)
                            <img src="{{asset($gallery->product_gallery_image)}}" alt="{{$product->product_name}}" width="300px" height="300px">
                                @endforeach
                                <br>
                                <a href="{{route('gallery_update',['id'=>$product->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')">Update gallery</a>
                        </td>
{{--                        {{dd($product->productGallery)}}--}}
                    </tr>
                    <tr>
                        <th>Slider</th>
                        <td>{{$product->slider == 1 ? "Go to Slider":"Dont Go to slider"}}</td>
                    </tr>
                    <tr>
                        <th>Product Discount Price</th>
                        <td>{{$product->status == 1 ? 'Published':'Unpublished'}}</td>
                    </tr>



                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


@endsection


@section('js')



@endsection
