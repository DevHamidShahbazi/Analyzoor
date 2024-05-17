<!-- Navbar -->
<nav class="main-header navbar navbar-expand sidebar-dark-primary navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block ">


        <li class="nav-item">
            <a class="nav-link text-light" target="_blank" href="{{ route('Home') }}">
                <i class="fas fa-home"></i>سایت
            </a>
        </li>
        <li class="nav-item">
            <a style="text-align: right;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               href="{{ route('logout') }}" class="nav-link text-light">
                <i class="fa fa-power-off"></i>خروج
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
