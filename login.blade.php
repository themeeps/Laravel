<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('material/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('material/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Redemptor
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('material/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('material/assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body>

  <div id="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		<marquee> <h1> <i> <font color=black> Hello Admin..</font> </i> </h1> </marquee>
          <h1>Redemptor</h1>
          <h2 class="subtitle">Welcome and Enjoy Working</h2>
          <form class="form-inline signup" role="form">
          </form>
        </div>
      </div>
		 <div class="container">
      <div class="row">
        <div class="col-md-12">
      <div class="row contctform">
        <div class="col-md-4">
        </div>
        <form action="{{ url('/dashboard') }}" method="GET" role="form" class="contactForm">
          <div class="col-md-20">
            <div class="form">
              <div class="form-group">
                <input type="text" name="username" class="form-control" id="name" placeholder="admin" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="password" />
              </div>
			  <input class="btn btn-primary btn-block" type="submit" name="submit" value="Sign in" onClick="Login()"/>
			  </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form">
                <div class="validation"></div>
          </div>
        </form>

      </div>
</body>

</html>