<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3">
                <div  style="text-align: center"></div>
                <a href="#" style="text-align: center" class="d-block">Fanoram</a>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link @section('dashboard') @show">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link @section('users') @show">
                            <i class="fa fa-users"></i>
                            @if(notify_user_new())
                                <span class="badge badge-danger right">{{ notify_user_new() }}</span>
                            @endif
                            <p>
                                لیست کاربران
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link @section('category') @show">
                            <i class="nav-icon fa fa-list-ol"></i>
                            <p>
                                 دسته بندی ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.article.index') }}" class="nav-link @section('Articles') @show">
                            <i class="fa fa-book"></i>
                            <p>
                                مقالات
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.file.index') }}" class="nav-link @section('files') @show">
                            <i class="fas fa-images"></i>
                            <p>
                                بارگذاری ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.private-file.index') }}" class="nav-link @section('private_files') @show">
                            <i class="fas fa-lock"></i>
                            <p>
                                بارگذاری های خصوصی
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.menu.index') }}" class="nav-link @section('menus') @show">
                            <i class="fas fa-stream"></i>
                            <p>
                                منو ها
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link @section('setting') @show">
                            <i class="fa fa-cogs"></i>
                            <p>
                                تنظیمات
                            </p>
                        </a>
                    </li>

{{--                    <li class="nav-item has-treeview @section('ArticleCategory-open') @show">--}}
{{--                        <a href="#" class="nav-link @section('list-article') @show">--}}
{{--                            <i class="fa fa-book"></i>--}}
{{--                            <p>--}}
{{--                                مدیریت مقالات--}}
{{--                                <i class="right fa fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('article.index') }}" class="nav-link @section('Articles') @show ">--}}
{{--                                    <p>مقالات</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('ArticleCategory.index') }}" class="nav-link @section('ArticleCategory') @show">--}}
{{--                                    <p>--}}
{{--                                        دسته بندی مقالات--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('setting.index') }}" class="nav-link @section('setting') @show">--}}
{{--                            <i class="fa fa-cogs"></i>--}}
{{--                            <p>--}}
{{--                                تنظیمات--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
