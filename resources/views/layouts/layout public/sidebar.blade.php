<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">


            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a class="col-12" href="{{route('Home')}}"><img class="col-12" src="{{setting_with_key('logo')->value}}" alt="{{setting_with_key('logo_alt')->value}}" srcset=""></a>
                </div>

            </div>


        </div>
        <div class="sidebar-menu">

            <div class="col-12 px-2">
                <form  method="GET" action="{{ route('search') }}" class="form-inline">
                    <input value="{{request()->query('name') ?? ''}}" autoComplete="off" dir="rtl" class="form-control mr-sm-2" name="name" type="search" placeholder="جستحو" aria-label="جستحو">
                </form>
            </div>

            <ul class="menu">

                @foreach($menus as $key => $menu)
                    <li class="sidebar-item ">
                        <a target="_blank" href="{{$menu->url}}" class='sidebar-link justify-content-center'>
                            <span>{{$menu->name}}</span>
                        </a>
                    </li>
                @endforeach


                    @auth()
                        @can('admin')
                            <li class="sidebar-item ">
                                <a target="_blank" href="{{url('/admin-panel')}}" class='sidebar-link justify-content-center'>
                                    <span>پنل مدیریت</span>
                                </a>
                            </li>

                        @endcan
                    @endauth



                @foreach( \App\Models\Category::with('children')->where('parent_id','0')->get() as $key => $parentCategory)
                    <li
                        class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link justify-content-evenly'>
                            <span>{{$parentCategory->name}}</span>
                        </a>

                        <ul class="submenu ">

                            <li class="submenu-item ">
                                <a href="{{route('parent.article.category',$parentCategory->slug)}}" class="submenu-link py-3">
                                    نمایش همه زیرمجموعه ها
                                </a>
                            </li>

                            @foreach($parentCategory->children()->get() as $key => $childCategory)
                                <li class="submenu-item ">
                                    <a href="{{route('child.article.category',$childCategory->slug)}}" class="submenu-link py-3">
                                        {{$childCategory->name}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>


                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
