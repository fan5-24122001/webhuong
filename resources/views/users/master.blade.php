<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>
    <base href="{{ URL::asset('users/') }}" target="_top">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="users/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="users/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="users/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="users/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="users/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="users/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="users/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="users/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="users/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include("users.layouts.header")
	<!--/slider-->
	
		
	@yield('content')
				
	
	@include("users.layouts.footer")
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form action="{{ route('search') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                          <input type="text" name="search" id="form1" class="form-control" style="margin: 15px"/>
                        
                        </div>
                        <button type="submit" class="btn btn-primary"  style="margin: 15px">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                 
                </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="users/js/jquery-3.3.1.min.js"></script>
<script src="users/js/bootstrap.min.js"></script>
<script src="users/js/jquery.magnific-popup.min.js"></script>
<script src="users/js/jquery-ui.min.js"></script>
<script src="users/js/mixitup.min.js"></script>
<script src="users/js/jquery.countdown.min.js"></script>
<script src="users/js/jquery.slicknav.js"></script>
<script src="users/js/owl.carousel.min.js"></script>
<script src="users/js/jquery.nicescroll.min.js"></script>
<script src="users/js/main.js"></script>
</body>

</html>