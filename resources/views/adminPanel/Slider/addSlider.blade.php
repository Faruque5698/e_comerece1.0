@extends('adminPanel.master')



@section('title')
    Add Slider
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Slider</h3>
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
                    <form action="{{url('save-brand')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label >Product Name</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Brand Image</label>
                                <input type="file" class="form-control @error('brand_image') is-invalid @enderror" name="brand_image" >
                                @error('brand_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Publication Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option >---Select Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </section>


@endsection


