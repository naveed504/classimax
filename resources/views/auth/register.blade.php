@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('content')
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
                    <form class="custom-form" method="POST" action="{{ route('register') }}">
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
                        <input type="password" autocomplete="off" name="confirm_password" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Account name</label>
                        <input type="text" name="account_name" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Account type </label>
                        <div class="selectParent">
                          <select class="form-control shadow-sm" name="account_type"  id="exampleFormControlSelect1">
                            <option>Business</option>
                            <option>Marketing</option>
                          </select>
                        </div>
                     
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Account email address</label>
                        <input  type="email" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" name="email" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Verify email address</label>
                        <input type="email" name="confimr_email" class="form-control shadow-sm" id="exampleFormControlInput1">
                      </div>
                      <div class="sign-up">
                        <button type="submit" class="btn btn-danger btn-block py-2 " value="Signup">Signup</button>
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
@endsection

