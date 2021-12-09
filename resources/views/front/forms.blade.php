@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('content')

<script type="text/javascript">
    function CheckColors(val){
     var element=document.getElementById('message');
     if(val== 'other')
       element.style.display='block';
     else  
       element.style.display='none';
    }
    function viewNonProfit(){
        var nonprofit = document.getElementById('nonprofit');
        var homebased = document.getElementById('homebased');
        nonprofit.style.display='block';
        homebased.style.display='none';
        document.getElementById("hb1").checked = false;
        document.getElementById("hb2").checked = false;
        document.getElementById("nf1").checked = false;
        document.getElementById("nf2").checked = true;
    }
    function viewHomeBased(){
        var nonprofit = document.getElementById('nonprofit');
        var homebased = document.getElementById('homebased');
        nonprofit.style.display='none';
        homebased.style.display='block';
        document.getElementById("nf2").checked = false;
        document.getElementById("hb2").checked = false;
        document.getElementById("nf1").checked = false;
        document.getElementById("hb1").checked = true;
    }
</script>

<section class="sign-up-banner mt-4  text-center">
    <div class="container">
  
      <div class="row">
        <div class="col-md-12">
         <div class="banner-content">
          <h3>Homebased Business Discount Application Form</h3>
          <p class="mb-0">None of your information will be made public, shared or sold.</p>
              <p class="mb-0">This information is used solely to determine your eligibility for our home-based business discount.</p>
              <p class="mb-0">You will be contacted once we have reviewed your information.</p>
              <p class="mb-0">Please contact us at <b>Forms@ForneyShoppingGuide.com </b> should you have questions</p>
         </div>
        </div>
      </div>
    </div>
  </section>
<div id="homebased">
    
    <section class=" form-bg py-5">
        <div class="container">
            <div class="row">
              <div class="col-md-3"></div>
                <div class="col-md-6">
                 <div class=" form-area-1  p-5 ">
                  <form class="custom-form">
                      <div class="row">
                        <div class="col-md-6 custom-column-100">
                          <label for="exampleFormControlInput1">Business Name  </label>
                          <input type="text" class="form-control ">
                        </div>
                        <div class="col-md-6 custom-column-100">
                          <label for="exampleFormControlInput1">Business Name  </label>
                          <input type="text" class="form-control ">
                        </div>
                      </div>
                 
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Business Address</label>
                      <input type="email" class="form-control " id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                      <label for="comment">Company Website and/or links to social or sales sites</label>
                      <textarea class="form-control " rows="4" id="comment"></textarea>
                    </div>
                    <label for="">Please select the one that most applies </label> <br>
                    <label class="mt-2" for="">Select Only one</label>
                    <div class="clearfix"></div>
                    <div class="form-check mt-3">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> I offer a product that is NOT available for local pickup
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> I offer a product available for local pickup
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> I offer a service performed at the customer’s location 
                      </label>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control " id="exampleFormControlInput1">
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> I offer a digital service delivered over the internet
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Other
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="comment">Please describe the product or service you offer</label>
                      <textarea class="form-control " rows="4" id="comment"></textarea>
                    </div>
                    <div class="sign-up">
                      <button class="btn btn-danger btn-block py-2  ">Complete</button>
                    </div>
               
                  </form>
                 </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
</div>

<div id="nonprofit" style="display: none">

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        {{-- <h5>Contact Us</h5> --}}
                        <h2 class="pt-3"> Non-Profit Group Discount Application Form</h2>
                        <p>
                            <ul>
                                <li>None of your information will be made public, shared or sold.</li>
                                <li>This information is used solely to determine your eligibility for our home-based business discount.</li>
                                <li>You will be contacted once we have reviewed your information.</li>
                                <li>Please contact us at Forms@ForneyShoppingGuide.com should you have questions</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="text-right mr-2">
                            <span>Home Based <input id="hb2" type="radio" onclick="viewHomeBased()"></span> &nbsp;
                            <span>NoN-Proift <input id="nf2" type="radio" checked></span>
                        </div>
                    </div>
                    <form action="{{route('application.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="type" value="nonporfit">
                            <fieldset class="p-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" name="u_name" placeholder="Your First & Last Name *" class="form-control"  required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" name="email" placeholder="Email Address:  *" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="b_name" placeholder="Name of the organization: *" class="form-control mb-3" required>
                                <input type="url" name="social_links" placeholder="Company Website and/or links to social or sales sites *" class="form-control mb-3" required>
                                <label for="checkbox">Can you provide a 501c3 docuemnt up on request? </label>
                                <br>
                                <input id="checkbox" name="has_document" type="checkbox">
                                <br>
                                <textarea name="message" placeholder="Please provide a short description of the organization *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                                <div class="btn-grounp">
                                    <input type="submit" class="btn btn-primary mt-2 float-right" value="Complete">
                                </div>
                            </fieldset>
                        </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
