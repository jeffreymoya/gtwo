<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Company ABC</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/custom.css') }}" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Company ABC</span>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{url()}}">Home</a></li>
                @if(Auth::guest())
                    <li @if(Request::is('about')) class="active" @endif><a href="{{url('about')}}">About</a>
                    </li>
                    <li @if(Request::is('contact')) class="active" @endif><a href="{{url('contact')}}">Contact</a>
                @elseif(Auth::check() AND Auth::user()->isAdmin())
                    <li @if(Request::is('sales')) class="active" @endif><a href="#">Sales</a></li>
                    <li @if(Request::is('orders')) class="active" @endif><a href="{{url('orders')}}">Approve Deposits</a></li>
                    <li @if(Request::is('members')) class="active" @endif><a href="#">Members</a></li>
                @else
                    <li @if(Request::is('orders')) class="active" @endif><a href="{{url('orders')}}">Orders</a></li>
                    <li @if(Request::is('referrals')) class="active" @endif><a href="{{url('referrals')}}">Referrals</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li @if(Request::is('auth/login')) class="active" @endif><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li @if(Request::is('auth/register')) class="active" @endif><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->user_id }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
        {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div><!-- /.container -->





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>
