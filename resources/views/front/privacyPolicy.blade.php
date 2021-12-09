@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('content')

<style>
	.privacy-banner {
	  /* background-image: url("./assets/images/privacy-header.png"); */
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}

	.privacy-banner-content h3 {
	  font-size: 30px;
	  color: #ffffff;
	  font-weight: 700;
	  text-align: center;
	}

	.privacy-section {
	  padding: 30px 0px 65px;
	}

	.privacy-section h4 {
	  font-size: 18px;
	  color: #000000;
	  font-weight: bold;
	  margin: 0px 0px 10px;
	}

	.privacy-section p {
	  font-size: 14px;
	  color: #767c88;
	  font-weight: 400;
	}

	.heading-privacy-section {
	  margin-bottom: 20px;
	}

	.privacy-flex {
	  display: flex;
	}

	.privacy-arrow-icon {
	  width: 5%;
	  margin-right: 20px;
	}

	.privacy-arrow-icon i {
	  color: #204aa0;
	}

	.privacy-flex-main {
	  margin-bottom: 40px;
	}

	@media only screen and (min-width: 768px) {
	  .privacy-section .container {
		padding: 0px;
	  }
	}
  </style>

 <section class="sign-up-banner mt-4 text-center privacy-banner">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="privacy-banner-content">
           <h3>{{@$privacyPolicy->title}}</h3>
         </div>
       </div>
     </div>
   </div>
 </section>



 <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto p-0">
               <div class="terms-condition-content">
                   <p>{!! @$privacyPolicy->description !!}</p>
               </div>
            </div>
        </div>
    </div>
</section>
 @endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('custom-js')

@endsection