@extends('adminPanel.master')



@section('title')
    Edit Brand
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Brand</h3>
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
                    <form action="{{url('update-brand')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Brand Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{$brand->brand_name}}" name="brand_name" placeholder="Enter Category Name">
                                <input type="hidden" class="form-control " value="{{$brand->id}}" name="id" placeholder="Enter Category Name">
                                @error('brand_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label >Brand Image</label>
                                <input type="file" class="form-control @error('brand_image') is-invalid @enderror" name="brand_image" >
                                <img src="{{asset($brand->brand_image)}}" alt="$brand->brand_name" width="200">
                                @error('brand_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Publication Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1" {{$brand->status == 1 ? "Selected" : ""}}>Published</option>
                                    <option value="0" {{$brand->status == 0 ? "Selected" : ""}}>Unpublished</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </section>


@endsection


