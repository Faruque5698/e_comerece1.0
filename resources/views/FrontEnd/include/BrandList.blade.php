<div class="brands-name">
    <ul class="nav nav-pills nav-stacked">
        @foreach($brands as $brand)
        <li><a href="#"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>

            @endforeach

    </ul>
</div>
