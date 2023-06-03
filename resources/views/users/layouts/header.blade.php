<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-2">
                <div class="header__logo">
                    <a href="./index.html"><img src="users/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Trang Chủ</a></li>
                        <li><a href="{{route('shop')}}">Cửa Hàng</a></li>
                        <li><a href="{{route('home.blog')}}">Tin Tức</a></li>
                        <li><a href="{{route('home.contact')}}">Gioi Thiệu</a></li>
                        <li><a href="{{route('home.contact')}}">Chính Sách Shop</a></li>
                    </ul>
                </nav>
            </div>
            @guest
            @if (Route::has('login'))
            
            <div class="col-lg-2">
                <div class="header__right">

                    <div class="header__right__auth">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                    </ul>
                </div>
            </div>
            @endif
            @else
            @if (Auth::user()->is_admin == 0)
            <div class="col-xl-2">
                <nav class="header__menu">
                    <ul>

                        <li><a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" style="width: 20px;">{{ Auth::user()->name  }}</a>
                            <ul class="dropdown">
                            <li><a href="{{ route('home.useredit',[Auth::user()->id]) }}">Profile</a></li>
                                <li><a href="{{ route('home.mycart') }}">Đơn hàng </a></li>

                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span>
                                            {{ __('Logout') }}
                                        </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </li>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="{{ route('listlove') }}"><span class="icon_heart_alt"></span>

                                </a></li>
                            <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}"><span
                                        class="icon_bag_alt"></span>

                                </a></li>
                        </ul>

                    </ul>
                </nav>
            </div>
            <!-- <div class="col-lg-4">
                <nav class="header__menu">
                    <ul>

                        <li><a href="#"><img src="users/123.png" style="width: 50px;">{{ Auth::user()->email  }}</a>
                            <ul class="dropdown">
                                <li><a href="./product-details.html">Profile</a></li>
                                <li><a href="{{ route('home.mycart') }}">Đơn hàng </a></li>

                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span>
                                            {{ __('Logout') }}
                                        </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </li>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="{{ route('listlove') }}"><span class="icon_heart_alt"></span>

                                </a></li>
                            <li><a href="{{ route('home.cartUser', [Auth::user()->id]) }}"><span
                                        class="icon_bag_alt"></span>

                                </a></li>
                        </ul>

                    </ul>
                </nav>
                <div>
 -->

            @endif
            @if (Auth::user()->is_admin == 1)
            <div class="col-lg-3">
                <div class="header__right">

                    <div class="header__right__auth">
                        <a href="#">{{ Auth::user()->email  }}</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                </path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>
                                {{ __('Logout') }}
                            </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>

                </div>
            </div>
            @endif
            @endguest
            <!-- <div class="col-lg-3">
                


                @guest
                                @if (Route::has('login'))
                                    <div class="header__right__auth">
                                        <a href="{{ route('register') }}" class="btn head-btn1">Đăng Ký</a>
                                        <a href="{{ route('login') }}" class="btn head-btn2">Đăng Nhập</a>
                                    </div>
                                @endif
                            @else
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            @if (Auth::user()->is_admin == 0)
                                                {{-- usser --}}
                                                <li><a href=""> <img src="{{ asset('admin/images/profile/pic1.jpg') }}"
                                                            width="40" alt=""> {{ Auth::user()->email  }}</a>
                                                    <ul class="submenu">
                                                      
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg"
                                                                    class="text-danger" width="18" height="18"
                                                                    viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                                                    </path>
                                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                                                </svg>
                                                                <span>
                                                                    {{ __('Logout') }}
                                                                </span>
                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                           
                                            @endif


                                        </ul>
                                    </nav>
                                </div>





                            @endguest

                    
                </div> -->
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
