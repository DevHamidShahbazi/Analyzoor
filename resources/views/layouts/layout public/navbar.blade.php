<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2" >
                            <img src="./public/img/avatar/user.png" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">John Ducky</h6>
                            <p class="user-dropdown-status text-sm text-muted">Member</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="#">My Account</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i style="font-size: x-large" class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>


    <nav class="main-navbar">
        <div class="d-flex justify-content-center container">
            <ul>

                @foreach($menus as $key => $menu)
                    <li
                        class="menu-item  ">
                        <a href="{{$menu->url}}" class='menu-link'>
                            <span>
{{--                                <i class="bi bi-grid-fill"></i>--}}
                                {{$menu->name}}</span>
                        </a>
                    </li>
                @endforeach



            </ul>
        </div>
    </nav>

</header>
