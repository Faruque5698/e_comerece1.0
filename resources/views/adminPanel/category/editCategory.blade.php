@extends('adminPanel.master')


@section('title')
    Edit Category
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
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
                    <form action="{{url('update-category')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Category Name</label>
                                <input type="text" class="form-control" name="cat_name" value="{{$categories->cat_name}}" placeholder="Enter Category Name">
                                <input type="hidden" class="form-control" name="id" value="{{$categories->id}}" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label >Category Description</label>
                                <input type="text" class="form-control" name="description" value="{{$categories->description}}" placeholder="Enter Category Description">
                            </div>
                            <div class="form-group">
                                <label >Category Image</label>
                                <input type="file" class="form-control" name="cat_image" ><br>
                                <img src="{{asset($categories->cat_image)}}" alt="cat_name" width="200">
                            </div>
                            <div class="form-group">
                                <label >Publication Status</label>
                                <select class="form-control" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1" {{$categories -> status == 1 ? 'Selected' : ''}}>Published</option>
                                    <option value="0" {{$categories -> status == 0 ? 'Selected' : ''}}>Unpublished</option>
                                </select>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>

                        </div>
                    </form>
            </div>
        </div>

    </section>


@endsection



