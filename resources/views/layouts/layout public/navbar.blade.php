<header class="mb-4">
    <div class="header-top">
        <div class="container">
            <a style="text-align: left" href="{{route('Home')}}"><img class="col-2" src="{{setting_with_key('logo')->value}}" alt="{{setting_with_key('logo_alt')->value}}"></a>
            <div class="header-top-right">

                @if(auth()->check())
                    <div class="dropdown">
                        <a class="user-dropdown d-flex align-items-center dropend dropdown-toggle gap-1" href="#" id="topbarUserDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text">
                                <h6 class="user-dropdown-name">{{auth()->user()->name}}</h6>
                            </div>
                            <div class="avatar avatar-md2 m-0" >
                                <img src="{{auth()->user()->image}}" alt="Avatar">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                            <li><a class="dropdown-item" href="{{route('user-panel.dashboard')}}">
                                    پنل کاربری
                                    <i class="fa fa-user"></i>
                                </a></li>
                            <li><hr class="dropdown-divider"></li>

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

                    <a href="{{route('login')}}" class="d-block font-weight-bold">
                        ورود / ثبت نام
                    </a>

                @endif


                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i style="font-size: x-large" class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>


    <nav class="main-navbar">
        <div class="d-flex justify-content-between ">
            <form  method="GET" action="{{ route('search') }}" class="form-inline">
                <input value="{{request()->query('name') ?? ''}}" autoComplete="off" dir="rtl" class="form-control mr-sm-2" name="name" type="search" placeholder="جستحو" aria-label="جستحو">
            </form>
            <ul>
                @auth()
                    @can('admin')

                        <li
                            class="menu-item  ">
                            <a target="_blank" href="{{url('/admin-panel')}}" class='menu-link'>
                            <span>پنل مدیریت</span>
                            </a>
                        </li>
                    @endcan
                @endauth

                @foreach($menus as $key => $menu)
                    <li
                        class="menu-item  ">
                        <a href="{{$menu->url}}" class='menu-link'>
                            <span>
                                {{$menu->name}}</span>
                        </a>
                    </li>
                @endforeach

            </ul>



        </div>
    </nav>

</header>

@include('alert.default.index')
