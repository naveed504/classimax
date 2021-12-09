@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('content')
<style>
  .faq-banner {
    background-image: url("../images/faq.jpg");
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .faq-banner-content h3 {
    font-size: 30px;
    color: #ffffff;
    font-weight: 700;
    text-align: center;
  }

  .accordion-section {
    padding: 30px 0px 65px;
  }

  .accordion-section .card {
    margin-bottom: 20px;
    grid-gap: 0px;
  }

  .accordion-section .card-header {
    background-color: #f6f6f6;
    border: 2px solid #e7e7e5;
    padding: 15px;
  }

  .accordion-section .card-body {
    border: 2px solid #e7e7e5;
    padding: 25px 15px 30px;
    font-size: 14px;
    color: #767c88;
    font-weight: 400;
  }

  .accordion-section h4 {
    font-size: 16px;
    color: #000000;
    font-weight: 500;
    margin: 0px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .accordion-section h4 i {
    font-size: 30px;
  }
  

  @media only screen and (min-width: 768px) {
    .accordion-section .container {
      padding: 0px;
    }
  }
</style>

<section class="sign-up-banner mt-4 text-center faq-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="faq-banner-content">
          <h3>FAQ</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="accordion-section">
  <div class="container">
    <div class="accordion" id="accordionExample">
    
                                @foreach (@$faqs as $faq)
      <div class="card">
        <div class="card-header" id="headingOne">
          <h4 data-toggle="collapse"
            data-target="#collapse{{$faq->id}}"
            aria-expanded="true"
            aria-controls="collapseOne"
          >
              <span class="badge"></span>{{$faq->question}}
            <i class="fa fa-angle-down" aria-hidden="true"></i>

          </h4>
        </div>

        <div
          id="collapse{{$faq->id}}"
          class="collapse"
          aria-labelledby="headingOne"
          data-parent="#accordionExample"
        >
          <div class="card-body">
            <p>{{$faq->answer}}</p>
          </div>
        </div>
      </div> 
      @endforeach
    </div>
  </div>
  
</section>


{{-- <section class="faq-section">
    <div class="container">
      <div class="row">
                        <!-- ***** FAQ Start ***** -->
 
                        <div class="col-md-6 offset-md-3">
                            <div class="faq" id="accordion">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach (@$faqs as $faq)
                           
                                <div class="card">
                                    <div class="card-header" id="faqHeading-1">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                                <span class="badge">{{$i++}}</span>{{$faq->question}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                                
                              
                            </div>
                        </div>
                      </div>
                    </div>
                    </section> --}}
@endsection