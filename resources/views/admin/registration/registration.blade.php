@extends('admin.master')

@section('title')
    Sign UP
    @endsection

@section('body')

    <form action="{{route('auth.create')}}" class="login-form" method="post">

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

        <div class="form-group">
            <input type="text" class="form-control rounded-left" name="name" id="name" placeholder="Name" required>

        </div>
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
        <div class="form-group">
            <input type="email" class="form-control rounded-left" name="email" id="email" placeholder="Email" required>

        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
        <div class="form-group d-flex">
            <input type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" required>
        </div>
        <span class="text-danger">@error('password') {{$message}} @enderror</span>
        <div class="form-group d-flex">
            <input type="password" class="form-control rounded-left" name="password_confirmation" id="password_confirmation" placeholder="Password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
        </div>
        <div class="form-group d-md-flex">
            <div class="w-50">

            </div>
            <div class="w-50 text-md-right">
                <a href="{{url('/login')}}">Sign In</a>
            </div>
        </div>
    </form>

    @endsection
