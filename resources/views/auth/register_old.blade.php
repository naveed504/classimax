<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,900&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    
    <!-- ************************************************************************ !-->
    <!-- *****                                                              ***** !-->
    <!-- *****       ¤ Designed and Developed by  LEADconcept               ***** !-->
    <!-- *****               http://www.leadconcept.com                     ***** !-->
    <!-- *****                                                              ***** !-->
    <!-- ************************************************************************ !-->
    <title>Community Classifieds</title>
    <style>
       
        
         
      </style>
  </head>

 
  <body>

    <section class="">
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
                                <li class="nav-item">
                                    <a class="nav-link cool-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cool-link" href="#">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cool-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link cool-link" href="#">Faq</a>
                                </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-3 offset-lg-0 order-lg-2 order-1 offset-md-6 col-md-6 col-12 navbtns_div">
                        <!-- <button class="btn login_btn"><i class="login_icon fas fa-long-arrow-alt-right"></i> Login</button> -->
                        <!-- <button class="btn login_btn"><i class="pr-2 fas fa-long-arrow-alt-right"></i>Login</button> -->
                        <a href="{{route('login')}}"  class="btn login_btn"><i class="pr-2 fas fa-long-arrow-alt-right"></i>Login</a>
                        <a href="{{route('register')}}" class="btn cstm_btn submit_btn"><img class="pr-2" src="{{asset('front/images/lock.png')}}" alt="">Register</a>
                        <!-- <button class="btn cstm_btn submit_btn" href="{{route('register')}}"><img class="pr-2" src="{{asset('front/images/lock.png')}}" alt="">Register</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sign-up-banner mt-4  text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
             <div class="banner-content">
              <h3>Register for your free Forney Community Classifieds Account</h3>
              <p>Every account comes with a free classifieds ad in perpetuity <br>
                run it and rerun it as long as you like</p>
             </div>
            </div>
          </div>
        </div>
      </section>
      <section class=" form-bg py-5">
          <div class="container">
              <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-md-6">
                   <div class="form-area  p-5 ">
                      <form method="POST" action="{{ route('register') }}">
                        <!-- Validation Errors -->
                        @if ($errors->any())
                            @if ($errors->first() != 'These credentials do not match our records.')
                                <x-auth-validation-errors class="mb-4 text-danger"
                                    :errors="$errors" />
                            @endif
                        @endif
                        <!-- Name -->
                        @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Username </label>
                        <span class="pl-2">(once set this cannot be changed)</span>
                        <input  type="text" name="name" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <p class="mb-0">(Username appears on all posts)</p>
                        <label for="exampleFormControlInput1">Password </label>
                        <input type="password" name="password" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <p  class="mb-0">(At least 8 characters, combination of uppercase and lowercase
                          letters, numbers and special symbols)</p>
                        <label for="exampleFormControlInput1">Confirm password</label>
                        <input type="password" name="confimr_password" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Account name</label>
                        <input type="text" name="account_name" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Account type </label>
                        <div class="selectParent">
                          <select class="form-control shadow-sm" name="account_type" id="exampleFormControlSelect1">
                            <option value="business">Business</option>
                            <option value="personal">Personal</option>
                          </select>
                        </div>
                     
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Account email address</label>
                        <input type="email" name="email" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Verify email address</label>
                        <input type="email" name="confimr_email" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="sign-up">
                        <input type="submit" class="btn btn-primary btn-block py-2" value="Signup">
                      </div>
                 
                    </form>
                   </div>
                  </div>
                  <div class="col-md-3"></div>
      
                    <div class="col-md-12 text-center">
                      <div class="already-have-an-account mt-5">
                        <p >Already have an account? <a href=""> Login</a> </p>
                      </div>
                    </div>
                  
              </div>
          </div>
      </section>
    
    <section class="footer_sec"> 
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-12">
                    <div class="text-center">
                        <div class="footer_des">
                            <p class="footer_text"> <a href="#">Terms of Use</a></p>
                            <p class="footer_text"> <a href="#">Privacy Policy</a></p>
                            <p class="footer_text"> <a href="#">Acceptable use policy</a></p>
                        </div>
                        <div class="d-flex footer_icons justify-content-center">
                             <a href="#"><img src="{{asset('front/images/fb.png')}}" class="social_icon" alt=""></a>
                             <a href="#"><img src="{{asset('front/images/in.png')}}" class="social_icon"  alt=""></a>
                             <a href="#"><img src="{{asset('front/images/yt.png')}}" class="social_icon"  alt=""></a>
                             <a href="#"><img src="{{asset('front/images/lin.png')}}" class="social_icon"  alt=""></a>
                        </div>
                        <div class="text-center text-white">
                            <p class="deepfooter1">© Copyright 2021 Community Classifieds. All rights reserved.</p>
                            <p class="deepfooter2">Designed & Developed by <a href="https://leadconcept.com/" target="_blank" class="">LEADconcpet</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
  



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



  </body>
</html>