<div class="container-fluid px-0 no-print bg_footer py-3">


    <div class="col-12 text-center">
        @if($menus->isNotEmpty())
            @foreach($menus as $key => $menu)
                <a class="btn btn-outline-white font-weight-bold mx-2" href="{{$menu->url}}">{{$menu->name}}</a>
            @endforeach
        @endif
    </div>
    <hr>
    <footer class="container d-flex flex-wrap justify-content-between align-items-center  ">
        <br>
        <div class="nav col-md-4 justify-content-center list-unstyled d-flex py-3">

            <a href="https://www.instagram.com/analyzoor?igsh=NDZzM2RqNjJvazds" class="mx-2" target="_blank">
                <li style="font-size: x-large" class="fab fa-instagram mx-3 text-white-50"></li>
            </a>
            <a href="https://t.me/+BunooUTLng82OWQ0" class="mx-2" target="_blank">
                <li style="font-size: x-large" class="fab fa-telegram mx-3 text-white-50"></li>
            </a>
            <a href="https://www.youtube.com/@analyzoor-23" target="_blank" class="mx-2">
                <li style="font-size: x-large" class="fab fa-youtube mx-3 text-white-50"></li>
            </a>

        </div>

        <br>
    </footer>
</div>



