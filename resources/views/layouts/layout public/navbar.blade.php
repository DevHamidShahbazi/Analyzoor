<header id="header" class="header header-top p-2 text-white fixed-top  no-print">
    <div class="d-flex justify-content-between flex-row-reverse">

        <div class="d-flex justify-content-center align-items-center gap-2 p-1">

            @if(auth()->check())
                <div class="dropdown">
                    <a class="user-dropdown text-white d-flex align-items-center dropend dropdown-toggle gap-1" href="#"
                       id="topbarUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class=" hidden-in-responsive">
                            <p class="user-dropdown-name">{{auth()->user()->name}}</p>
                        </div>
                        <div class="avatar avatar-md2 m-0">
                            <img src="{{auth()->user()->image}}" alt="Avatar">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="{{route('user-panel.dashboard')}}">
                                پنل کاربری
                                <i class="fa fa-user"></i>
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               href="{{ route('logout') }}">
                                خروج
                                <i class="fa fa-power-off"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            @else
                <div style="margin-right: 10px;width: max-content" class="font-weight-bold text-white p-1">
                    <a class="font-weight-bold text-white p-1" href="{{route('login')}}">ورود</a>
                    /
                    <a class="font-weight-bold text-white p-1" href="{{route('register')}}">ثبت نام</a>
                </div>
            @endif

            <a href="#" class="burger-btn d-block d-xl-none ml-2">
                <i style="font-size: x-large" class="fa fa-bars text-white"></i>
            </a>

        </div>

        <ul class="d-flex align-items-center scroll-x col-sm-8 hidden-in-responsive px-0 col-lg-auto justify-content-center m-0"
            style="font-size: 10px;gap: 25px">

            @if($menus->isNotEmpty())
                @foreach($menus as $key => $menu)
                    <li class="d-inline-block">
                        <a class="text-white" href="{{$menu->url}}">{{$menu->name}}</a>
                    </li>
                @endforeach
            @endif

            @auth()
                @can('admin')
                    <li class="d-inline-block">
                        <a class="text-white" href="{{ url('/admin-panel') }}">پنل ادمین</a>
                    </li>
                @endcan
            @endauth


            <li class="d-inline-block">
                <a class="text-white" href="{{ route('Home') }}">صفحه اصلی</a>
            </li>

        </ul>

        <div class="d-flex align-items-center p-2 mr-0">
            <a class="text-end" href="{{route('Home')}}"><img class="col-lg-3 col-md-4 col-sm-5 col-6" src="/public/img/logo/logo-white-text.png" alt="{{setting_with_key('logo_alt')->value}}" srcset=""></a>
        </div>

    </div>
</header>

@include('alert.default.index')



