<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#030821 !important;">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Continental Fashion</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/admin.gif') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('dashboard') }}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{--  <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>  --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i> <!-- Updated icon for Users -->
                        <p>Users</p>
                    </a>
                </li>


                <li
                    class="nav-item has-treeview {{ Request::is('admin/master-crud*') || Request::is('admin/prefix*') || Request::is('admin/size*') || Request::is('admin/weight*') || Request::is('admin/colors*') || Request::is('admin/price*') || Request::is('admin/discount*') || Request::is('admin/country*') || Request::is('admin/vat*') || Request::is('admin/department*') || Request::is('admin/brand*') || Request::is('admin/category*') || Request::is('admin/subcategory*') || Request::is('admin/material*') || Request::is('admin/article*') || Request::is('admin/certification*') || Request::is('admin/wear*') || Request::is('admin/fabric*') || Request::is('admin/dimension*') || Request::is('admin/promotional*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/master-crud*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>

                        <p>
                            Master Crud
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('prefix.index') }}"
                                class="nav-link {{ Request::is('admin/prefix') ? 'active' : '' }}">
                                <i class="fas fa-tag nav-icon"></i>
                                <p>Prefix</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('size.index') }}"
                                class="nav-link {{ Request::is('admin/size') ? 'active' : '' }}">
                                <i class="fas fa-ruler-combined nav-icon"></i>
                                <p>Size</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('weight.index') }}"
                                class="nav-link {{ Request::is('admin/weight') ? 'active' : '' }}">
                                <i class="fas fa-weight-hanging nav-icon"></i>
                                <p>Fabrics Weight(GSM)</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('colors.index') }}"
                                class="nav-link {{ Request::is('admin/colors*') ? 'active' : '' }}">
                                <i class="fas fa-palette nav-icon"></i>
                                <p>Color</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('price.index') }}"
                                class="nav-link {{ Request::is('admin/price') ? 'active' : '' }}">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Price Level</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('discount.index') }}"
                                class="nav-link {{ Request::is('admin/discount') ? 'active' : '' }}">
                                <i class="fas fa-percent nav-icon"></i>
                                <p>Discount%</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('country.index') }}"
                                class="nav-link {{ Request::is('admin/country') ? 'active' : '' }}">
                                <i class="fas fa-globe nav-icon"></i>
                                <p>Country</p>
                            </a>
                        </li>
                        {{--  <li class="nav-item">
                            <a href="{{ route('vat.index') }}"
                                class="nav-link {{ Request::is('admin/vat*') ? 'active' : '' }}">
                                <i class="fas fa-receipt nav-icon"></i>
                                <p>VAT%</p>
                            </a>
                        </li>  --}}
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}"
                                class="nav-link {{ Request::is('admin/department') ? 'active' : '' }}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}"
                                class="nav-link {{ Request::is('admin/brand') ? 'active' : '' }}">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategory.index') }}"
                                class="nav-link {{ Request::is('admin/subcategory') ? 'active' : '' }}">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>Subcategory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('material.index') }}"
                                class="nav-link {{ Request::is('admin/material') ? 'active' : '' }}">
                                <i class="fas fa-boxes nav-icon"></i>
                                <p>Material</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('article.index') }}"
                                class="nav-link {{ Request::is('admin/article') ? 'active' : '' }}">
                                <i class="fas fa-newspaper nav-icon"></i> <!-- Updated icon -->
                                <p>Article No.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('certification.index') }}"
                                class="nav-link {{ Request::is('admin/certification') ? 'active' : '' }}">
                                <i class="fas fa-certificate nav-icon"></i> <!-- Updated icon -->
                                <p>Certifications</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('wear.index') }}"
                                class="nav-link {{ Request::is('admin/wear') ? 'active' : '' }}">
                                <i class="fas fa-tshirt nav-icon"></i> <!-- Updated icon -->
                                <p>Who Should Wear</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fabric.index') }}"
                                class="nav-link {{ Request::is('admin/fabric') ? 'active' : '' }}">
                                <i class="fas fa-scroll nav-icon"></i> <!-- Updated icon -->
                                <p>Fabric Quality</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dimension.index') }}"
                                class="nav-link {{ Request::is('admin/dimension') ? 'active' : '' }}">
                                <i class="fas fa-ruler-combined nav-icon"></i> <!-- Updated icon -->
                                <p>Dimension</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('promotional.index') }}"
                                class="nav-link {{ Request::is('admin/promotional') ? 'active' : '' }}">
                                <i class="fas fa-bullhorn nav-icon"></i> <!-- Updated icon -->
                                <p>Promotional Info</p>
                            </a>
                        </li>












                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ route('banners.index') }}"
                        class="nav-link {{ Request::is('admin/banners*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i> <!-- Updated icon for Products -->
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news-offers.index') }}"
                        class="nav-link {{ Request::is('admin/news-offers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i> <!-- Icon for News & Offers -->
                        <p>News & Offers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('subscriptions.index') }}"
                        class="nav-link {{ Request::is('admin/subscriptions*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i> <!-- Updated icon for Subscriptions -->
                        <p>Subscriptions</p>
                    </a>
                </li>

                {{--  <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('admin/measurementchart') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ruler-combined"></i>
                        <p>
                            Measurement Chart
                        </p>
                    </a>
                </li>  --}}

                {{--  <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('admin/shippingcost') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Shipping Cost
                        </p>
                    </a>
                </li>  --}}



                <li class="nav-item">
                    <a href="{{ route('faq.index') }}"
                        class="nav-link {{ Request::is('admin/faq') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i> <!-- Updated icon -->
                        <p>
                            FAQs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cancellation-policy.index') }}"
                        class="nav-link {{ Request::is('admin/cancellation-policy') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ban"></i> <!-- Updated icon for cancellation policy -->
                        <p>
                            Cancellation Policy
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('aboutus.index') }}"
                        class="nav-link {{ Request::is('admin/aboutus') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            About Us
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('privacy.index') }}"
                        class="nav-link {{ Request::is('admin/privacy-policy') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Privacy Policy
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('termscondition.index') }}"
                        class="nav-link {{ Request::is('admin/termscondition') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>
                            Terms and Conditions
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('password.change.index') }}"
                        class="nav-link {{ Request::routeIs('password.change.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Change Password</p>
                    </a>
                </li>



            </ul>

            <!-- Logout Link -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
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
