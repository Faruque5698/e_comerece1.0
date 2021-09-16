
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Register</title>
    @include('FrontEnd.include.css')
</head>
<body>


{{--@include('FrontEnd.include.header')--}}

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-sm-12">
            <div class="contact-form-right">
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
                <h2>New User SignUp !</h2>
                <form action="{{url('customer_register')}}" method="post" id="contactForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required data-error="Please Enter Your Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="password" class="form-control" placeholder="Password" id="name" name="password" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="from-group">
                           <div class="submit-button text-center">
                               <button class="btn hvr-hover" style="background-color: #1aa67d; color: white" id="submit1" type="submit">SignUp</button>
                               <div id="msgSubmit" class="h3 text-center hidden"></div>
                               <div class="clearfix"></div>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-1 col-sm-12" id="or">
            OR
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="contact-form-right">
                <h2>Already Member Just SignIn !</h2>
                <form action="{{route('hello')}}" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="password" class="form-control" placeholder="Password" id="name" name="password" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="from-group">
                            <div class="submit-button text-center">
                                <input type="submit" class="btn hvr-hover" style="background-color: #1aa67d; color: white" value="Sing IN">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('FrontEnd.include.Footer')
</body>
</html>

