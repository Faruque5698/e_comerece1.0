@extends('adminPanel.master')



@section('title')
    Eidt Sub Sub Category
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Sub Sub Category</h3>
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
                    <form action="{{url('sub_sub_category-update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" value="{{$sub_sub_category->id}}" class="form-control" name="id" >
                                <label >Sub Category Name</label>
                                <select class="form-control @error('sub_cat_id') is-invalid @enderror" name="sub_cat_id">
                                    <option >---Select Category---</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}"{{$sub_sub_category->sub_cat_id == $subCategory->id  ? 'Selected' : ''}}>{{$subCategory->sub_cat_name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_cat_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Sub Sub Category Name</label>
                                <input type="text" value="{{$sub_sub_category->sub_sub_cat_name}}" class="form-control @error('sub_sub_cat_name') is-invalid @enderror" name="sub_sub_cat_name" placeholder="Enter Sub Category Description">
                                @error('sub_sub_cat_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label >Publication Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1"{{$sub_sub_category->status == 1 ?'Selected' : ''}}>Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Sub Sub Category</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </section>


@endsection

@section('js')
    <script>
        CKEDITOR.replace( 'sub_cat_desc' );
    </script>
@endsection


