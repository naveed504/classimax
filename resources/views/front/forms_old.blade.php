@extends('front.layouts.app')    
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
<div id="homebased">
    
        <section class="section">
            <div class="container">
                @if (\Session::has('success'))
                <div class="ml-4 mr-4">
                    <li class="alert alert-success " style="list-style-type:none">{!! \Session::get('success') !!}</li>
                </div>
                @endif
                
                <div class="row">
                    
                       
                    <div class="col-md-6">
                        <div class="contact-us-content p-4">
                            {{-- <h5>Contact Us</h5> --}}
                            <h2 class="pt-3">Homebased Business Discount Application Form</h2>
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
                                <span>Home Based <input id="hb1" type="radio" checked></span> &nbsp;
                                <span>NoN-Proift <input id="nf1" type="radio" onclick='viewNonProfit()'></span>
                            </div>
                        </div>
                            <form action="{{route('application.store')}}" method="post">
                                @csrf
                                <input type="hidden" value="homebased" name="type">
                                <fieldset class="p-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="text" name="b_name" placeholder="Business Name *" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="email" name="email" placeholder="Email Address:  *" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
    
                                    <input type="text" name="b_address" placeholder="Business Address *" class="form-control mb-3" required>
                                    <input type="url" name="social_links" placeholder="Company Website and/or links to social or sales sites *" class="form-control mb-3" required>
                                    <select name="select" class="form-control w-100" onchange='CheckColors(this.value);'>
                                        <option value="1">Please select the one that most applies </option>
                                        <option value="I offer a product that is NOT available for local pickup">I offer a product that is NOT available for local pickup</option>
                                        <option value="I offer a product available for local pickup">I offer a product available for local pickup </option>
                                        <option value="I offer a service performed at the customer’s location">I offer a service performed at the customer’s location </option>
                                        <option value="I offer a digital service delivered over the internet">I offer a digital service delivered over the internet</option>
                                        <option value="other">Other (text box opens when selected) </option>
                                    </select>
                                    <textarea name="message" id="message" style='display:none;'  placeholder="Please provide a short description of the organization *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
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
