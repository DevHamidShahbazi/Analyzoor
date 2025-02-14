<div id="sidebar">
    <div class="sidebar-wrapper royal-dark active">
        <div class="sidebar-header position-relative">


            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a class="col-6" href="{{route('Home')}}"><img class="col-12" src="{{setting_with_key('logo')->value}}" alt="{{setting_with_key('logo_alt')->value}}" srcset=""></a>
                </div>
            </div>

            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i style="font-size: x-large" class="fas fa-times text-white"></i></a>
            </div>
        </div>
        <div class="sidebar-menu">

            <ul class="menu">

                @auth()
                    @can('admin')
                        <li class="sidebar-item ">
                            <a target="_blank" href="{{url('/admin-panel')}}" class='sidebar-link justify-content-center'>
                                <span class="text-white">پنل مدیریت</span>
                            </a>
                        </li>

                    @endcan
                @endauth

                @foreach($menus as $key => $menu)
                    <li class="sidebar-item ">
                        <a target="_blank" href="{{$menu->url}}" class='sidebar-link justify-content-center'>
                            <span class="text-white">{{$menu->name}}</span>
                        </a>
                    </li>
                @endforeach






{{--                @foreach( \App\Models\Category::with('children')->where('parent_id','0')->get() as $key => $parentCategory)--}}
{{--                    <li--}}
{{--                        class="sidebar-item  has-sub">--}}
{{--                        <a href="#" class='sidebar-link justify-content-evenly'>--}}
{{--                            <span>{{$parentCategory->name}}</span>--}}
{{--                        </a>--}}

{{--                        <ul class="submenu ">--}}

{{--                            <li class="submenu-item ">--}}
{{--                                <a href="{{route('article.category',$parentCategory->slug)}}" class="submenu-link py-3">--}}
{{--                                    نمایش همه زیرمجموعه ها--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            @foreach($parentCategory->children()->get() as $key => $childCategory)--}}
{{--                                <li class="submenu-item ">--}}
{{--                                    <a href="{{route('article.category',$childCategory->slug)}}" class="submenu-link py-3">--}}
{{--                                        {{$childCategory->name}}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}

{{--                        </ul>--}}


{{--                    </li>--}}
{{--                @endforeach--}}

            </ul>
        </div>
    </div>
</div>
