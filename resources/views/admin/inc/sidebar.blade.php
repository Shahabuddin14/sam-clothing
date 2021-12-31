<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Role management --}}
                @isset(auth()->user()->role->permission['permission']['role.index']['list'])
                    <li class="nav-item @yield('role-open')">
                        <a href="#" class="nav-link @yield('role')">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Role
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link @yield('role-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endisset

                {{-- Permission management --}}
                @isset(auth()->user()->role->permission['permission']['permission.index']['list'])
                    <li class="nav-item @yield('permission-open')">
                        <a href="#" class="nav-link @yield('permission')">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Permission
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('permission.index') }}" class="nav-link @yield('permission-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission list</p>
                                </a>
                            </li>
                            @isset(auth()->user()->role->permission['permission']['permission.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('permission.create') }}" class="nav-link @yield('permission-create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permission create</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- Admin management --}}
                @isset(auth()->user()->role->permission['permission']['subAdmin.index']['list'])
                    <li class="nav-item @yield('sub-admin-open')">
                        <a href="#" class="nav-link @yield('sub-admin')">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Admin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('subAdmin.index') }}" class="nav-link @yield('sub-admin-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin list</p>
                                </a>
                            </li>

                            @isset(auth()->user()->role->permission['permission']['subAdmin.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('subAdmin.create') }}" class="nav-link @yield('sub-admin-create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin create</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- Category management --}}
                @isset(auth()->user()->role->permission['permission']['category.list']['list'])
                    <li class="nav-item @yield('category-open')">
                        <a href="#" class="nav-link @yield('category')">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Item
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('category.list') }}" class="nav-link @yield('category-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Item list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endisset

                {{-- Department management --}}
                @isset(auth()->user()->role->permission['permission']['department.list']['list'])
                    <li class="nav-item @yield('department-open')">
                        <a href="#" class="nav-link @yield('department')">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Department
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('department.list') }}" class="nav-link @yield('department-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>department list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endisset

                {{-- Brand management --}}
                @isset(auth()->user()->role->permission['permission']['brand.list']['list'])
                    <li class="nav-item @yield('brand-open')">
                        <a href="#" class="nav-link @yield('brand')">
                            <i class="nav-icon fab fa-bimobject"></i>
                            <p>
                                Brand
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('brand.list') }}" class="nav-link @yield('brand-list')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Brand list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endisset

                {{-- Rate management --}}
                @isset(auth()->user()->role->permission['permission']['admin.rate']['list'])
                    <li class="nav-item">
                        <a href="{{ route('admin.rate') }}" class="nav-link @yield('rate')">
                            <i class="nav-icon fas fa-euro-sign"></i>
                            <p>Rate</p>
                        </a>
                    </li>
                @endisset

                {{-- Brand management --}}
                @isset(auth()->user()->role->permission['permission']['product.list']['list'])
                    <li class="nav-item @yield('product-open')">
                        <a href="#" class="nav-link @yield('product')">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['product.list']['list'])
                                <li class="nav-item">
                                    <a href="{{ route('product.list') }}" class="nav-link @yield('product-list')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product list</p>
                                    </a>
                                </li>
                            @endisset

                            @isset(auth()->user()->role->permission['permission']['product.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('product.create') }}" class="nav-link @yield('product-create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add product</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                <li class="nav-item">
                    <a href="{{ route('admin.user-view') }}" class="nav-link @yield('user-list')">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>All user</p>
                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-power"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
