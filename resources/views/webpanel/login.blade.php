<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Login</title>
    <link href="{{asset('webpanel/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('webpanel/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('webpanel/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('webpanel/assets/css/style-responsive.css')}}" rel="stylesheet">
</head>

<body>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="{{route('webadmin.auth')}}" method="post">
            <h2 class="form-login-heading">sign in now</h2>
            <p style="color:#F00; padding-top:20px;" align="center">
                @if(session()->has('msg'))
                        {{ session()->get('msg') }}
                @endif
            </p>
            <div class="login-wrap">
                @csrf
                <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password"><br>
                <input name="login" class="btn btn-theme btn-block" type="submit">

            </div>
        </form>

    </div>
</div>
<script src="{{asset('webpanel/assets/js/jquery.js')}}"></script>
<script src="{{asset('webpanel/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('webpanel/assets/js/jquery.backstretch.min.js')}}"></script>
<script>
  $.backstretch("{{asset('webpanel/assets/img/login-bg.jpg')}}", {speed: 500});
</script>


</body>
</html>
