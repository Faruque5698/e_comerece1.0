<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/admin/admin')}}/index3.html" class="brand-link">
        <img src="{{asset('/admin/admin')}}/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset($LoggedUserInfo->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$LoggedUserInfo->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{url('/')}}" class="nav-link {{'/' == request()->path() ? ' active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview
                {{'category' == request()->path() ? ' menu-open' : ''}}
                {{'add-category' == request()->path() ? ' menu-open' : ''}}
                {{'sub-category' == request()->path() ? ' menu-open' : ''}}
                {{'sub_sub_category' == request()->path() ? ' menu-open' : ''}}
                    ">
                    <a href="{{url('category')}}" class="nav-link{{'category' == request()->path() ? ' active' : ''}}
                    {{'add-category' == request()->path() ? ' active' : ''}}
                    {{'sub_sub_category' == request()->path() ? ' active' : ''}}
                    {{'sub-category' == request()->path() ? ' active' : ''}}


                        ">
                        <i class="fa fa-list-alt"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('category')}}" class="nav-link {{'category' == request()->path() ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('add-category')}}" class="nav-link {{'add-category' == request()->path() ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('sub-category')}}" class="nav-link {{'sub-category' == request()->path() ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('sub_sub_category')}}" class="nav-link {{'sub_sub_category' == request()->path() ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                {{'Admin-Panel/list' == request()->path() ? ' menu-open' : ''}}
                {{'Admin-registration' == request()->path() ? ' menu-open' : ''}}">
                    <a href="#" class="nav-link
                    {{'Admin-Panel/list' == request()->path() ? ' active' : ''}}
                    {{'Admin-registration' == request()->path() ? ' active' : ''}}">
                        <i class="fa fa-user" > </i>
                        <p>
                            New Admin Register
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('Admin-Panel/list')}}" class="nav-link {{'Admin-Panel/list' == request()->path() ? ' active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('Admin-registration')}}" class="nav-link {{'Admin-registration' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> New Admin Register </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{url('brands')}}" class="nav-link {{'brands' == request()->path() ? ' active' : ''}} {{'add-brand' == request()->path() ? ' active' : ''}} ">
                        <i class="fa fa-list-ul"></i>
                        <p>
                            Brands

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview {{'products' == request()->path() ? 'menu-open' : ''}}">
                    <a href="{{url('products')}}" class="nav-link ">
                        <i class="nav-icon fab fa-product-hunt" aria-hidden="true"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('products')}}" class="nav-link {{'products' == request()->path() ? 'active' : ''}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products Details</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{url('slider')}}" class="nav-link {{'slider' == request()->path() ? ' active' : ''}}  ">
                        <i class="fa fa-sliders-h"></i>
                        <p>
                            Slider

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="{{url('stock')}}" class="nav-link {{'slider' == request()->path() ? ' active' : ''}}  ">

                        <i class="fas fa-truck-loading"></i>


                        <p>
                            Stock Manager

                        </p>
                    </a>

                </li>



            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
