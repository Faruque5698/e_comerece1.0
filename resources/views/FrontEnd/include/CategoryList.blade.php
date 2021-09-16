<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach($categories as $category)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->cat_name}}">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{$category->cat_name}}
                </a>
            </h4>
        </div>
        <div id="{{$category->cat_name}}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                   @foreach($subcategories as $subcategory)
                       @if($subcategory->cat_id == $category->id)
                    <li><a href="{{route('display_product',['id' => $subcategory->id])}}">{{$subcategory->sub_cat_name}}</a></li>
                    @endif
                       @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach



</div>
