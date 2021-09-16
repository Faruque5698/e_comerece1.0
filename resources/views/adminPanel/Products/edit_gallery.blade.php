@extends('adminPanel.master')
)


@section('title')
    Edit Gallery Image
@endsection

@section('body')

    <section class="content">

        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">

                    <form action="{{url('update-gallery-image')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach($gallery_image as $image)
                        <div class="form-group">


                            <input type="file" class="form-control" name="product_gallery_image[{{$image->id}}]" ><br>


                            <img src="{{asset($image->product_gallery_image)}}" alt="cat_name" width="200" height="200">


                        </div>

                        @endforeach
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Gallery</button>
                        </div>



                    </form>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


@endsection


@section('js')



@endsection
