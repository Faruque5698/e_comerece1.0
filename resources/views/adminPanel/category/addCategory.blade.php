@extends('adminPanel.master')



@section('title')
    Add Category
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
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
                <form action="{{url('save-category')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label >Category Name</label>
                            <input type="text" class="form-control" name="cat_name" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label >Category Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter Category Description">
                        </div>
                        <div class="form-group">
                            <label >Category Image</label>
                            <input type="file" class="form-control" name="cat_image" >
                        </div>
                        <div class="form-group">
                            <label >Publication Status</label>
                            <select class="form-control" name="status">
                                <option >---Select Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


@endsection


