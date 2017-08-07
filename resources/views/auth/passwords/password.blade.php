<!DOCTYPE html>
<html>
<head>
<title>Artisan INC</title>  
  <link rel="icon" type="image/jpg" href="{{ asset('img/artisan.png') }}">
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="charset=utf-8" />
  <meta name="author" content="wonderful | Adnekan" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="A community focused developer.">
  <meta name="keywords" content="wonderful , programming, software, code, tech, computer stuff, games, cheatsheet, html, css, javascript, websites, website development, web development, design, ui, ux" />
  <meta property="og:locale" content="en-US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Wonderful" />
  <meta property="og:description" content="A community focused on code and developers." />
  <meta property="og:url" content="http://www.thegazine.blogspot.com" />
  <meta property="og:site-name" content="wonderful" />
  <meta property="article:publisher" content="https://facebook.com/wondertechnologies" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="wonderful" />
  <meta name="twitter:site" content="@w_adenekan" />
  <meta name="twitter:domain" content="" />
  <!-- css frame works -->
 <link rel="stylesheet" href="css/normalize.css" type="text/css">
<!--  <bootstrap framworks> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" type="text/css" href="css/materialpaper.css') }}"> -->
  <!-- <font awesome> -->
 <!--  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/material-icon.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- <custom stylings> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <!-- <Custom Animations> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
  <!-- <reponsiveness css> -->
  <link rel="stylesheet" type="text/css" href="	{{ asset('css/responsive.css') }}">
  <!-- <end of custom animation> -->
  
</head>

<!-- <end of head> -->
<body>
<nav class="navbar navbar-default navbar-static-top animated bounce" id="navbar" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
      </button><!-- <end of buton> -->
      <a href="/" class="navbar-brand read-article" id="read-article"><i class="material-icons navbarand">flash_auto</i></button></a>
    </div><!-- <end of navbar-header> -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
       {{--  <li><a href="#" class="smoothScrol read-article" id="read-article" data-toggle="modal" data-target="#myemail"><i class="material-icons">inbox</i> </a></li>
        <li><a href="#" id="read-article"><i class="material-icons">add_circle</i> </a></li> --}}
         <li><a href="#" class="smoothScrol read-article" id="read-article"  data-toggle="modal" data-target="#myemail">Sign up</a></li>
      </ul><!-- <end of navbar right> -->
    </div><!-- <end of navbar-collaspe> -->
  </div><!-- <end of Container> -->
</nav>
<!-- <end of navbar> -->
 
<main id="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        
      </div>
      <div class="col-md-4 col-xs-12 col-sm-12">
          <div class="well login-well">
          <center>
            <i class="material-icons">flash_auto</i>
          </center>
              <p class="text-center">Enter your email to reset your passowrd</p>
              <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Enter your Email or Username" value="{{ old('usr_email') }}" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('usr_email') }}</strong>
                      </span>
                  @endif
                  <button type="sumbit" class="btn btn-primary btn-group-justified">Reset Passowrd</button>
                  <p class="text-center">Not A memeber Yet <a href=" #" data-toggle="modal" data-target="#myemail">Create An Account Now</a></p>
                </div>
              </form>
              <center>
                <button type="button" class="btn btn-primary btr"><i class="fa fa-facebook fa-1x"></i></button>
                <button type="button" class="btn btn-primary btr"><i class="fa fa-instagram fa-1x"></i></button>
                <button type="button" class="btn btn-primary btr"><i class="fa fa-twitter fa-1x"></i></button>
              </center>
          </div>
      </div>
      <div class="col-md-4">
        
      </div>
    </div>
  </div>
</main>
<div class="page-bg">
</div>
<div id="myemail" class="modal fade animated bounceIn" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">&#xE14C;</i></button>
      </div>
      <div class="modal-body">
       <h3 class="modal-title text-center">Create a new account</h3>
       <p class="text-center">Get started - get work done!</p><hr>
        <form method="POST" action="/register">
        {{ csrf_field() }}
          <div class="form-group">
            <div class="container-fluid">
              <div>
                <input class="form-control input" name="name" placeholder="Full Name" type="text" value="{{ old('name') }}" required autofocus />
                <p id="fn_err" class="text-danger">
                    @if ($errors->has('name'))
                      {{ $errors->first('name') }}
                    @endif
                </p>
              </div>
              <div>
                <input class="form-control input" name="username" placeholder="Userame" type="text" value="{{ old('username') }}" required id="username"/>
                <p id="un_err" class="text-danger">
                  @if ($errors->has('username'))
                    {{ $errors->first('username') }}
                  @endif
                </p>
              </div>
              <div>
                <input type="text" id="reg_mail" name="email" placeholder="Your Email" class="form-control input" value="{{ old('email') }}">
                <p id="em_err" class="text-danger">
                  @if ($errors->has('email'))
                      {{ $errors->first('email') }}
                    @endif
                </p>
              </div>
              <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control input" name="password" placeholder="Password" type="password" required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control input" name="password_confirmation" placeholder="Confirm Password" type="password" required />
                </div>
                </div>
                <p id="ps_err" class="text-danger">
                  @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                  @endif
                </p>
              <div class="row">
                <div class="col-xs-6 col-md-6">
                  <p><input type="radio" name="acc_type" value="{{ $clientType }}" required> &nbsp;&nbsp;&nbsp;Register as Client </p>
                </div>
                <div class="col-xs-6 col-md-6">
                  <p><input type="radio" name="acc_type" value="{{ $artisanType }}" required> &nbsp;&nbsp;&nbsp;Register as Artisan </p>
                </div>
              </div><br>
              <p class="ihaveread pull-right">I have Read all terms and conditions involved <input type="checkbox" name="agree" required> </p>

              <button type="sumbit" class="btn btn-primary btn-group-justified modal-button">Sign Up Now</button><br>

              {{-- <h4 class="text-center">To Be A client Register <a href="#"  data-dismiss="modal" data-toggle="modal" data-target="#myclient">Here Now</a></h4> --}}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="" src="{{ asset('js/jqey.js') }}"></script>
<script type="" src="{{ asset('js/boots.js') }}"></script>
<script type="" src="{{ asset('js/registration.js') }}"></script>
</body>
</html>