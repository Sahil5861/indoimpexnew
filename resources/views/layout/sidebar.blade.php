<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>                
                {{-- <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('admin.document', 'admin.document_type') ? 'nav-item-expanded' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.document', 'admin.document_type') ? 'active' : '' }}">
                        <i class="ph-layout"></i>
                        <span>Manage Documents</span>
                    </a>
                    <ul
                        class="nav-group-sub {{ request()->routeIs('admin.document', 'admin.document_type') ? 'nav-group-sub-expanded' : 'collapse' }}">
                            <li class="nav-item">
                                <a href="{{ route('admin.document') }}"
                                    class="nav-link {{ request()->routeIs('admin.document') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Documents</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.document_type') }}"
                                    class="nav-link {{ request()->routeIs('admin.document_type') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Document Types</span>
                                </a>
                            </li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.user') }}"
                        class="nav-link {{ request()->routeIs('admin.user') ? 'active' : '' }}">
                        <i class="ph-user"></i>
                        <span>Manage Users</span>
                    </a>
                </li>                 --}}
                
                {{-- <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('admin.role', 'admin.colour', 'admin.size', 'admin.dealers', 'admin.contactPersons', 'admin.plan', 'blogs.index') ? 'nav-item-expanded' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.role', 'admin.colour', 'admin.size', 'admin.dealers', 'admin.contactPersons', 'admin.plan', 'blogs.index') ? 'active' : '' }}">
                        <i class="ph-layout"></i>
                        <span>Master</span>
                    </a>
                    <ul class="nav-group-sub {{ request()->routeIs('admin.role', 'admin.colour', 'admin.size', 'admin.dealers', 'admin.contactPersons', 'admin.plan', 'blogs.index') ? 'nav-group-sub-expanded' : 'collapse' }}">
                            <li class="nav-item">
                                <a href="{{ route('admin.role') }}"
                                    class="nav-link {{ request()->routeIs('admin.role') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Manage Roles</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.colour') }}"
                                    class="nav-link {{ request()->routeIs('admin.colour') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Manage Colours</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.size') }}"
                                    class="nav-link {{ request()->routeIs('admin.size') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Manage Sizes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.plan') }}"
                                    class="nav-link {{ request()->routeIs('admin.plan') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Manage Plans</span>
                                </a>
                            </li>                            
                        <!-- 
                                            <li class="nav-item">
                                                <a href="{{ route('blogs.index') }}"
                                                    class="nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                                                    <i class="ph-layout"></i>
                                                    <span>Manage Blogs</span>
                                                </a>
                                            </li>
                                -->
                    </ul>
                </li>                     --}}
                    <li class="nav-item nav-item-submenu">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.brand') || request()->routeIs('admin.category') || request()->routeIs('admin.grouprelation') || request()->routeIs('admin.product') ? 'active' : '' }}">
                            <i class="ph-layout"></i>
                            <span>Manage Products</span>
                        </a>
                        <ul class="nav-group-sub {{request()->routeIs('admin.brand', 'admin.category', 'admin.grouprelation', 'admin.product') ? '' : 'collapse'}}">
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.brand') }}"
                                    class="nav-link {{ request()->routeIs('admin.brand') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Brands</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.category') }}"
                                    class="nav-link {{ request()->routeIs('admin.category') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.grouprelation') }}"
                                    class="nav-link {{ request()->routeIs('admin.grouprelation') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Group Relations</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.product') }}"
                                    class="nav-link {{ request()->routeIs('admin.product') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                        </ul>
                    </li>                
                {{-- <li
                    class="nav-item nav-item-submenu {{ request()->routeIs('admin.gallery') ? 'nav-item-expanded' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                        <i class="ph-layout"></i>
                        <span>Manage Gallery</span>
                    </a>
                    <ul
                        class="nav-group-sub {{ request()->routeIs('admin.gallery') ? 'nav-group-sub-expanded' : 'collapse' }}">                            
                            <li class="nav-item">
                                <a href="{{ route('admin.gallery') }}"
                                    class="nav-link {{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                                    <i class="ph-layout"></i>
                                    <span>Gallery</span>
                                </a>
                            </li>                            
                    </ul>
                </li> --}}
                

            </ul>

        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->