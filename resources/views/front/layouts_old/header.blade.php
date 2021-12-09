<style>
    .btn {
        border: none;
    }

    body {
        /* overflow-x: hidden !important; */
    }
  
</style>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('front/images/logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            @if (auth()->user() &&
                                   auth()->user()->hasRole('user'))
                                 <li class="nav-item {{ Request::routeIs('forms') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('forms.view')}}">Forms</a>
                                </li>
                                <li class="nav-item {{ Request::routeIs('categories') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('front.package')}}">Pricing Page</a>
                                </li>
                            @else
                                <li class="nav-item {{ Request::routeIs('categories') ? 'active' : '' }}">
                                    <a class="nav-link" href="#">Categories</a>
                                </li>
                            @endif

                            <li class="nav-item {{ Request::routeIs('faqs') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('show.faqs')}}">FAQ</a>
                            </li>
                            {{-- <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Pages <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('show.faqs')}}">FAQ</a>
                                </div>
                            </li> --}}
                            <li class="nav-item {{ Request::routeIs('listings') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('listings') }}">Listings</a>
                            </li>

                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @if (Route::has('login'))

                                <li class="nav-item">
                                    @auth
                                    <li class="nav-item">
                                        <a class="nav-link text-white add-button" href="{{ route('post.create') }}"><i
                                                class="fa fa-plus-circle"></i> Add Listing</a>
                                    </li>
                                    {{-- <a href="{{ url('/') }}" class="nav-link login-button" >{{auth()->user()->name}}</a> --}}
                                    <li class="nav-item dropdown dropdown-slide">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ auth()->user()->name }}
                                        </a>
                                        <!-- Dropdown list -->
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </div>
                                    </li>

                                    {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                                @else
                                    {{-- <a href="{{ route('login') }}" class="nav-link login-button">Log in</a> --}}

                                    <!-- Button trigger modal -->
                                    <ul class="navbar-nav ml-auto main-nav ">
                                    <li class="nav-item">
                                        <button type="button" class="btn nav-link" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Login
                                    </button>
                                    </li>
                                    <li class="nav-item">
                                    <button type="button" class="btn nav-link" data-toggle="modal"
                                        data-target="#exampleModal1">
                                        Register
                                    </button>
                                     </li>
                                   </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" style="background-color: rgb(255 255 255 / 38%)" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                                    <button type="button" class="close btn" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <x-guest-layout>


                                                        <form method="POST" action="{{ route('login') }}">
                                                            <x-auth-session-status class="mb-4"
                                                                :status="session('status')" />

                                                            <!-- Validation Errors -->
                                                            @if ($errors->any())

                                                                @if ($errors->first() == 'These credentials do not match our records.')
                                                                    <x-auth-validation-errors class="mb-4"
                                                                        :errors="$errors" />
                                                                @endif
                                                            @endif
                                                            @csrf

                                                            <!-- Email Address -->
                                                            <div>
                                                                <x-label for="email" :value="__('Email')" />

                                                                <x-input id="email" class="block mt-1 w-full" type="email"
                                                                    name="email" :value="old('email')" required autofocus />
                                                            </div>

                                                            <!-- Password -->
                                                            <div class="mt-4">
                                                                <x-label for="password" :value="__('Password')" />

                                                                <x-input id="password" class="block mt-1 w-full"
                                                                    type="password" name="password" required
                                                                    autocomplete="current-password" />
                                                            </div>

                                                            <!-- Remember Me -->
                                                            <div class="block mt-4">
                                                                <label for="remember_me" class="inline-flex items-center">
                                                                    <input id="remember_me" type="checkbox"
                                                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                                        name="remember">
                                                                    <span
                                                                        class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                                </label>
                                                            </div>

                                                            <div class="flex items-center justify-end mt-4">
                                                                @if (Route::has('password.request'))
                                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                        href="{{ route('password.request') }}">
                                                                        {{ __('Forgot your password?') }}
                                                                    </a>
                                                                @endif

                                                                <x-button style="background-color: #a676b8"
                                                                    class="ml-3">
                                                                    {{ __('Log in') }}
                                                                </x-button>
                                                            </div>
                                                        </form>

                                                    </x-guest-layout>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" style="background-color: rgb(255 255 255 / 38%)" id="exampleModal1" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                                                    <button type="button" class="close btn" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <x-guest-layout>

                                                        <form method="POST" action="{{ route('register') }}">
                                                            <!-- Validation Errors -->
                                                            @if ($errors->any())
                                                                @if ($errors->first() != 'These credentials do not match our records.')
                                                                    <x-auth-validation-errors class="mb-4"
                                                                        :errors="$errors" />
                                                                @endif
                                                            @endif
                                                            <!-- Name -->
                                                            @csrf
                                                            <div>
                                                                <x-label for="name" :value="__('Name')" />

                                                                <x-input id="name" class="block mt-1 w-full" type="text"
                                                                    name="name" :value="old('name')" required autofocus />
                                                            </div>

                                                            <!-- Email Address -->
                                                            <div class="mt-4">
                                                                <x-label for="email" :value="__('Email')" />

                                                                <x-input id="email" class="block mt-1 w-full" type="email"
                                                                    name="email" :value="old('email')" required />
                                                            </div>

                                                            <!-- Password -->
                                                            <div class="mt-4">
                                                                <x-label for="password" :value="__('Password')" />

                                                                <x-input id="password" class="block mt-1 w-full"
                                                                    type="password" name="password" required
                                                                    autocomplete="new-password" />
                                                            </div>

                                                            <!-- Confirm Password -->
                                                            <div class="mt-4">
                                                                <x-label for="password_confirmation"
                                                                    :value="__('Confirm Password')" />

                                                                <x-input id="password_confirmation"
                                                                    class="block mt-1 w-full" type="password"
                                                                    name="password_confirmation" required />
                                                            </div>

                                                            <div class="flex items-center justify-end mt-4">
                                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                    href="{{ route('login') }}">
                                                                    {{ __('Already registered?') }}
                                                                </a>

                                                                <x-button style="background-color: #a676b8"
                                                                    class="ml-4">
                                                                    {{ __('Register') }}
                                                                </x-button>
                                                            </div>
                                                        </form>
                                                    </x-guest-layout>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                </li>

                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@if ($errors->any())
    @if ($errors->first() == 'These credentials do not match our records.')
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#exampleModal1').modal('show');
            });
        </script>
    @endif
@endif

