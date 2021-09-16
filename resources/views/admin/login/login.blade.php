@extends('admin.master')
@section('title')
    Sign In
    @endsection
@section('body')

    <form action="{{route('auth.check')}}" class="login-form" method="post">

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
            <input type="text" class="form-control rounded-left" name="email" id="email" placeholder="Email" >
        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
        <div class="form-group d-flex">
            <input type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" >
        </div>
        <span class="text-danger">@error('password') {{$message}} @enderror</span>
        <div class="form-group">
            <button type="submit" id="signIn" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputCity">Email</label>
                <input type="text" class="form-control" value="ashaduzzaman5698@gmail.com" id="copyEmail" readonly disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Password</label>
                <input type="text" class="form-control" value="12345678" id="copyPassword" readonly disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Copy</label>
                <button class="form-control btn-success" id="copy">Copy</button>
            </div>
        </div>

    </form>

    @endsection

@section('js')
    <script type="text/javascript">

        $(document).ready(function (){
            $('#copy').click(function (){
                $('#email').val($('#copyemail').val());
                $('#password').val($('#copypassword').val());
            });
        });

    </script>
    @endsection
