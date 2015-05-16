<!doctype html>
<html lang="en">
<head>
<title>Company ABC</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('css/font.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="{{ url('js/jquery-1.9.0.min.js') }}"></script> 
<script src="{{ url('js/jquery.openCarousel.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('js/easing.js') }}"></script>
<script type="text/javascript" src="{{ url('js/move-top.js') }}"></script>
@yield('assets')
</head>
<body>
    <div class="header">
            <div class="wrap">
                <div class="header_top">
                    <div class="logo">
                        <a href="{{ url() }}">Company ABC</a>
                    </div>
                        <div class="header_top_right">
                            <div class="links">
                            @if(Auth::check())
                              @if(Auth::user()->isAdmin())
                                <a href="#">members</a>&nbsp;|&nbsp;
                                <a href="{{url('orders')}}">approve purchases</a>&nbsp;|&nbsp;
                                <a href="{{url('auth/logout')}}">logout</a>
                              @else
                                <a href="{{url('orders')}}">orders</a>&nbsp;|&nbsp;
                                <a href="{{url('referrals')}}">referrals</a>&nbsp;|&nbsp;
                                <a href="{{url('auth/logout')}}">logout</a>
                              @endif
                            @else
                              <a href="{{url('auth/login')}}">login</a>&nbsp;|&nbsp;
                              <a href="{{url('auth/register')}}">register</a>
                            @endif
                            </div>
                            <div class="search_box">
                                <span>Search</span>
                                <form>
                                    <input type="text" value=""><input type="submit" value="">
                                </form>
                                <div class="clear"></div>
                            </div>
                    </div>
                 <div class="clear"></div>
            </div>     
            <div class="navigation">
                <a class="toggleMenu" href="#">Menu</a>
                    <ul class="nav">
                        <li>
                            <a href="{{url()}}">Home</a>
                        </li>
                        <li class="test">
                            <a href="#" class="parent">Product A</a>
                            <ul>
                                <li>
                                    <a href="#" class="parent">Product A1</a>
                                    <ul>
                                        <li><a href="#">Product A1.1</a></li>
                                        <li><a href="#">Product A1.2</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="parent">Product A2</a>
                                    <ul>
                                        <li><a href="#">Product A2.1</a></li>
                                        <li><a href="#">Product A2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="parent">Product B</a>
                            <ul>
                                <li>
                                    <a href="#" class="parent">Product B1</a>
                                </li>
                                <li>
                                    <a href="#" class="parent">Product B2</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="parent">Product C</a>
                        </li>
                        <li>
                            <a href="#" class="parent">Product D</a>
                        </li>
                        <li>
                            <a href="#" class="parent">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="parent">Contact Us</a>
                        </li>
                    </ul>
                     <span class="left-ribbon"> </span> 
                     <span class="right-ribbon"> </span>    
            </div>
             <div class="header_bottom">
               @yield('headercontent')
             <div class="clear"></div>
          </div>
        </div>
   </div>
   <!------------End Header ------------>
  <div class="main">
      <div class="content">
          @yield('content')
      </div>
    </div>
   <div class="footer">
      <div class="wrap">      
           <div class="footer-nav">
            <ul>
                <li><a href="#">Terms of Use</a> : </li>
                <li><a href="#">Privacy Policy</a> : </li>
                <li><a href="contact.html">Contact Us</a> : </li>
                <li><a href="#">Sitemap</a></li>
            </ul>
           </div>       
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {          
            $().UItoTop({ easingType: 'easeOutQuart' });
            
        });
    </script>
    <a href="#" id="toTop"> </a>
    <script type="text/javascript" src="{{ url('js/navigation.js') }}"></script>



<a href="#" id="toTop">To Top</a></body></html>
