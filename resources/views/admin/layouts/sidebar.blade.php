<!-- SidebarSearch Form -->
<?php
$user = auth()->user();

?>


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link
        
          @if (url()->full() == url('') . '/dashboard')
            active
          @endif
        ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

        </li>

        @if ($user->hasRole('Admin'))


            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->full() == url('') . '/category/create')
           active
        @endif
        @if (url()->full() == url('') . '/category')
           active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Categories
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Categories</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->current() == url('') . '/user/create')
            active
        @endif
        @if (url()->current() == url('') . '/user')
            active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add User </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('showPayments') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Users Packages</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->current() == url('') . '/role/create')
            active
        @endif
        @if (url()->current() == url('') . '/role')
            active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Roles
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('role.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Role </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Roles</p>
                        </a>
                    </li>
                </ul>
            </li>
          
        @endif
        @if ($user->hasRole(['user', 'Admin']))
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->current() == url('') . '/post/create')
            active
            @endif
            @if (url()->current() == url('') . '/post')
            active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Posts
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('post.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Post </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('draft.posts') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Draft Posts</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if ($user->hasRole(['Admin']))
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->current() == url('') . '/faq/create')
            active
            @endif
            @if (url()->current() == url('') . '/faq')
            active
            @endif
            ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        FAQ's
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('faq.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add FAQ's </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faq.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View FAQ's</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->current() == url('') . '/pricing/create')
            active
            @endif
            @if (url()->current() == url('') . '/pricing')
            active
            @endif
            ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Pricing
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- <li class="nav-item">
                        <a href="{{ route('pricing.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Price </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('pricing.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Price</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link
        @if (url()->full() == url('') . '/category/create')
           active
        @endif
        @if (url()->full() == url('') . '/category')
           active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Pages
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('terms.of.use') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Terms Of Use </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('privacy.policy') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Privacy Policy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('acceptable.Use.Policy') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Acceptable Use Policy</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('application.index') }}"
                    class="nav-link
        @if (url()->current() == url('') . '/application')
            active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Applications
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('banner.index') }}"
                    class="nav-link
        @if (url()->current() == url('') . '/banner')
            active
        @endif
        ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Banners
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>
            </li>
           
        @endif


       
       



    </ul>
</nav>
