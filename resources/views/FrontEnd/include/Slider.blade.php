<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>Shop</h1>
                                {{--                                <h2>Free E-Commerce Template</h2>--}}
                                <p>You Can Bye any product Here</p>
{{--                                <button type="button" class="btn btn-default get">Get it now</button>--}}
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('banner/download.png')}}" class="girl img-responsive" alt="" height="300px" width="300px"/>
{{--                                <img src=""  class="pricing" alt="" />--}}
                            </div>
                        </div>
                        @foreach($sliders as $slider)
                        <div class="item">

                                <div class="col-sm-6">
                                    <h1>{{$slider->product_name}}</h1>
                                    {{--                                <h2>Free E-Commerce Template</h2>--}}
                                    <p>{!! $slider->product_description !!}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset($slider->product_image)}}" class="girl img-responsive" alt=""  height="300px" width="300px"/>
                                    <img src="{{asset('/FrontEnd')}}/images/home/pricing.png"  class="pricing" alt="" />
                                </div>

                        </div>
                            @endforeach



                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
