@extends('adminPanel.master')



@section('title')
    Admin Registration Update
@endsection

@section('body')

    <section class="content">
        <div class=" offset-2 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Admin Registration Update</h3>
                </div>
                @csrf
                <div class="results">
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>

                    @endif
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>

                    @endif

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin_profile_update')}}" class="login-form" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}"  placeholder="Enter Category Name">
                            <input type="hidden" class="form-control " name="id" value="{{$user->id}}"  placeholder="Enter Category Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter Category Description">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <input type="file" class="form-control" name="image" >
                            <img src="{{asset($user->image)}}" alt="{{$user->name}}" width="200">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="password" value="{{$user->password}}" placeholder="Enter Category Description">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label >Confirm Password</label>--}}
{{--                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Category Description">--}}
{{--                        </div>--}}



                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Admin Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


@endsection


