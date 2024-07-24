<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beverages Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="{{asset('adminassets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('adminassets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('adminassets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('adminassets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('adminassets/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
            
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username or email" name="email" required="" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            {{-- to handel seperating errors of the login and register forms --}}
            {{-- @if($errors->login()->any())
              @foreach($errors->login()->all as $error)
              <p>{{$error}}</p>
              @endforeach
            @endif --}}
            {{-- @if($errors->getBag('login')->any())
            @foreach($errors->getBag('login')->all() as $error)
            <p>{{$error}}</p>
            @endforeach
          @endif --}}
              </div>

              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required="" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div>
                {{-- <a class="btn btn-default submit" href="index.html">Log in</a> --}}
                <input type="submit" class="btn btn-block btn-default submit" value="login" >
                <a class="reset_pass" href="#">Lost your password?</a>
            
            
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Beverages Admin</h1>
                  <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </div>
          
            </form>
          </section>
        </div>
   
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="{{ route('register') }}">
                @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" name="fullname" value="{{ old('fullname') }}" required="" />
                @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            {{-- @if($errors->getBag('register')->any())
            @foreach($errors->getBag('register')->all() as $error)
            <p>{{$error}}</p>
            @endforeach
          @endif --}}
              </div>
              <div>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required="" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required="" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required="" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div>
                {{-- <a class="btn btn-default submit" href="{{route('users')}}">Submit</a> --}}
                <input type="submit" class="btn btn-block btn-default submit" value="submit">
                    {{-- <input class="btn btn-block btn-default" type="submit" value="Sign up"> --}}
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Beverages Admin</h1>
                  <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        
        </div>
      </div>
    </div>
  </body>
</html>
