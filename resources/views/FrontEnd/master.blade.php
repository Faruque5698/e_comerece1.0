<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    @include('FrontEnd.include.css')
<!--[if lt IE 9]>
    <script src="{{asset('/FrontEnd')}}/js/html5shiv.js"></script>
    <script src="{{asset('/FrontEnd')}}/js/respond.min.js"></script>
    <script src="{{asset('/FrontEnd')}}/css.css"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('/FrontEnd')}}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/FrontEnd')}}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/FrontEnd')}}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/FrontEnd')}}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/FrontEnd')}}/images/ico/apple-touch-icon-57-precomposed.png">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('/carts')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/carts')}}/css/custom.css"/>
</head><!--/head-->

<body>

@include('FrontEnd.include.header')

@include('FrontEnd.include.Slider')<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    @include('FrontEnd.include.CategoryList')<!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        @include('FrontEnd.include.BrandList')
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('/FrontEnd')}}/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
            @yield('body')

        </div>
    </div>
</section>

@include('FrontEnd.include.Footer')<!--/Footer-->



<script src="{{asset('/FrontEnd')}}/js/jquery.js"></script>
<script src="{{asset('/FrontEnd')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/FrontEnd')}}/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('/FrontEnd')}}/js/price-range.js"></script>
<script src="{{asset('/FrontEnd')}}/js/jquery.prettyPhoto.js"></script>
<script src="{{asset('/FrontEnd')}}/js/main.js"></script>
<script src="{{asset('/FrontEnd')}}/js.js"></script>


<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $("#qty, #pro_price").keyup(function () {



            var x = Number($("#pro_price").val());
            var y = Number($("#qty").val());

            var z = x*y;

            $("#total_price").val(z);
            $("#taka").val(z);

        });

    });


</script>

</body>
</html>
