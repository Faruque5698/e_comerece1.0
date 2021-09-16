
@extends('adminPanel.master')



@section('title')
    Edit Products
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Products</h3>
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
                    <form action="{{url('/product_update')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label >Category Name</label>
                                <select class="form-control productCategory" name="cat_id" id="cat_id" >
                                    <option >---Select Category---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Brand Name</label>
                                <select class="form-control" name="brand_id">
                                    <option >---Select Brand---</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"{{$product->brand_id == $brand->id ? 'Selected' : ''}}>{{$brand->brand_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label >Sub Category</label>
                                <select class="form-control subCategory" name="sub_cat_id" id="sub_cat_id">
                                    <option disabled="true" selected="true">---Select Sub category---</option>;

                                </select>
                            </div>
                            <div class="form-group">
                                <label >Sub Sub Category</label>
                                <select class="form-control subsubCategory" name="sub_sub_cat_id">
                                    <option disabled="true" selected="true">---Select Sub category---</option>;

                                </select>
                            </div>

                            <div class="form-group">
                                <label >product Name</label>
                                <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name">
                                <input type="hidden" class="form-control" name="id" value="{{$product->id}}" >
                            </div>


                            <div class="form-group">
                                <label >Product Description</label>
                                <textarea name="product_description" class="form-control @error('product_description') is-invalid @enderror" placeholder="Enter Description">{{$product->product_description}}</textarea>
                                @error('product_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label >product Quantity</label>
                                <input type="text" class="form-control"  value="{{$product->product_quantity}}" name="product_quantity" placeholder="Enter Product quantity">
                            </div>

                            <div class="form-group">
                                <label >product Price</label>
                                <input type="text" class="form-control" value="{{$product->product_price}}" id="product_price" name="product_price" placeholder="Enter Product price">
                            </div>


                            <div class="form-group">
                                <label >product discount</label>
                                <input type="text" class="form-control"value="{{$product->product_discount}}" id="product_discount" name="product_discount" placeholder="Enter Product discount">
                                <br>
                                <input  type="radio" style="margin-top: 10px;margin-left: 30px;" id="disc_pers" {{$product->product_discount_type == '%' ?'checked':''}} name="product_discount_type"  value="%"> %
                                <input type="radio" name="product_discount_type" {{$product->product_discount_type == 'tk' ?'checked':''}} style="margin-top: 10px; margin-left: 60px;" value="tk" id="disc_taka"> TK
                                <br><br>
                                <input type="button" id="cal" value="Discount Calculate" onclick="discount_calculation()">
                            </div>


                            <div class="form-group">
                                <label >product discount Price</label>
                                <input type="text" class="form-control" value="{{$product->product_discount_price}}" id="product_discount_price" name="product_discount_price" placeholder="Enter Product discount price">
                            </div>
                            <div class="form-group">
                                <label >Product Image</label>
                                <input type="file" class="form-control" id="product_image" name="product_image" >
                                <img src="{{asset($product->product_image)}}" alt="{{$product->product_name}}" width="200">
                            </div>
                            <div class="form-group">
                                <label >Slider Status</label>
                                <select class="form-control" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1" {{$product->slider == 1 ? 'Selected':''}}>Go to Slider</option>
                                    <option value="0" {{$product->slider == 0 ? 'Selected':''}}>Dont Go to Slider</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Publication Status</label>
                                <select class="form-control" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1" {{$product->status == 1 ? 'Selected':''}}>Published</option>
                                    <option value="0" {{$product->status == 0 ? 'Selected':''}}>Unpublished</option>
                                </select>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Product</button>
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
            $(document).on('change','.productCategory',function () {
                // console.log('hmm its change')
                var sub_cat=$('select[name="sub_cat_id"]')
                var category_id=$(this).val();
                // console.log(category_id);
                var div=$(this).parent();

                // var op=" ";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findsubcategory')!!}',
                    data:{'id':category_id},
                    success:function (data) {
                        // console.log('success');
                        //
                        // console.log(data);
                        // console.log(data.length);

                        var op= `<option disabled="true" selected="true">---Select Sub category---</option>`;

                        for (var i=0;i<data.length;i++) {
                            op += '<option value="' + data[i].id + '" >' + data[i].sub_cat_name + '</option>';

                        }

                        sub_cat.html(op);

                    },
                    error:function () {

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change','.subCategory',function () {
                // console.log('hmm its change')
                var sub_sub_cat=$('select[name="sub_sub_cat_id"]')
                var subcategory_id=$(this).val();
                console.log(subcategory_id);
                {{--var div=$(this).parent();--}}

                {{--// var op=" ";--}}

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findsubsubcategory')!!}',
                    data:{'id':subcategory_id},
                    success:function (data) {
                        console.log('success');
                        {{--        //--}}
                        console.log(data);
                        console.log(data.length);

                        var op= `<option disabled="true" selected="true">---Select Sub Sub Category---</option>`;

                        for (var i=0;i<data.length;i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].sub_sub_cat_name + '</option>';

                        }

                        sub_sub_cat.html(op);

                    },
                    error:function () {

                    }
                });
            });
        });
    </script>

    <script type="text/javascript">

        function discount_calculation() {
            if (document.getElementById('disc_taka').checked){
                var n1=parseFloat(document.getElementById('product_price').value);
                var n2=parseFloat(document.getElementById('product_discount').value);

                var n=n1-n2;

                document.getElementById('product_discount_price').value=n;
            }
            if(document.getElementById('disc_pers').checked){
                var n1=parseFloat(document.getElementById('product_price').value);
                var n2=parseFloat(document.getElementById('product_discount').value);

                var n=(n2/100)*n1;
                var n3 = n1-n;

                document.getElementById('product_discount_price').value=n3;
            }
        }


    </script>
    <script>
        CKEDITOR.replace( 'product_description' );
    </script>



@endsection


