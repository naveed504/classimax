<div class="bg-white">
        <div class="container">
            <div class="row">
<div class="col-lg-9 order-lg-1 order-2 col-12 px-lg-0">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand" href="#">
                            <img src="{{asset('front/images/logo.png')}}" class="img-fluid web_logo" alt="">
                            </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                                <a class="nav-link cool-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cool-link" href="#">My Account</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('categories') ? 'active' : '' }}">
                                <a class="nav-link cool-link" href="{{route('front.package')}}">Pricing</a>
                            </li>
                            <li class="nav-item  {{ Request::routeIs('faqs') ? 'active' : '' }}">
                                <a class="nav-link cool-link" href="{{route('show.faqs')}}">Faq</a>
                            </li>
                            <li class="nav-item  {{ Request::routeIs('faqs') ? 'active' : '' }}">
                                <a class="nav-link cool-link" href="https://forneyshoppingguide.com/">Retuen To FSG</a>
                            </li>
                            </ul>
                            
                        </div>
                    </nav>
                </div>
                @auth
               
                <div class="col-lg-3 offset-lg-0 order-lg-2 order-1 offset-md-6 col-md-6 col-12 navbtns_div">
                   
                    <a href="{{route('admin.logout')}}"  {class="btn login_btn"><i class="pr-2  { Request::routeIs('admin.logout') ? 'admin.logout' : '' }}" ></i>Logout</a>
                    
                </div>
                @else
                <div class="col-lg-3 offset-lg-0 order-lg-2 order-1 offset-md-6 col-md-6 col-12 navbtns_div">
                    <a href="{{route('login')}}"  class="btn login_btn"><i class="pr-2 fas fa-long-arrow-alt-right"></i>Login</a>
                    <a href="{{route('register')}}" class="btn cstm_btn submit_btn"><img class="pr-2" src="{{asset('front/images/lock.png')}}" alt="">Register</a>
                </div>
                @endauth
               
                </div>
        </div>
    </div>