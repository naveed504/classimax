@extends('front.layouts.app')
<style>
    .hide{
       display: none;
    }
 </style>
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                        <div class="package-content-heading border-bottom">
                            <i class="fa fa-paper-plane"></i>
                            <h2>{{$pricing->listing_duration}} Days</h2>
                            {{-- <h4 class="py-3"> <span>${{$pricing->standard_listing}}</span></h4> --}}
                        </div>
                        <ul>
                            <li class="my-4"> <i class="fa fa-check"></i>Standard Listing(1 img &1 category)${{$pricing->standard_listing}}</li>
                            <li class="my-4"> <i class="fa fa-check"></i> Each Additional Image ${{$pricing->each_additional_image}}</li>
                            <li class="my-4"> <i class="fa fa-check"></i>Each Additional category ${{$pricing->each_additional_category}}</li>
                            <li class="my-4"> <i class="fa fa-check"></i>Additional Duration Days ${{$pricing->duration_days}}</li>
                            
                        </ul>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="text-right mr-2">
                        <span>Card <input id="hb1" name="paymentStatus" value="card" type="radio" checked></span> &nbsp;
                        <span>Pay With Paypal <input id="nf1" name="paymentStatus" value="paypal" type="radio" ></span>
                    </div>
                </div>
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   <p>{{ Session::get('success') }}</p><br>
                </div>
                @endif
                <br>
                <form  role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{config('services.stripe.publisherKey')}}" id="payment-form">
                    @csrf
                    <div class='form-row row'>
            
                        <input type="hidden" name="package_id" value="{{$pricing->id}}">
                        <input type="hidden" name="total" value="{{$pricing->total}}">
                        <input type="hidden" name="name" value="{{$pricing->name}}">
                       <div class='col-xs-12 col-md-6 form-group required'>
                          <label class='control-label'>Name on Card</label> 
                          <input class='form-control' size='4' type='text'>
                       </div>
                       <div class='col-xs-12 col-md-6 form-group required'>
                          <label class='control-label'>Card Number</label> 
                          <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                       </div>                           
                    </div>                        
                    <div class='form-row row'>
                       <div class='col-xs-12 col-md-4 form-group cvc required'>
                          <label class='control-label'>CVC</label> 
                          <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                       </div>
                       <div class='col-xs-12 col-md-4 form-group expiration required'>
                          <label class='control-label'>Expiration Month</label> 
                          <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                       </div>
                       <div class='col-xs-12 col-md-4 form-group expiration required'>
                          <label class='control-label'>Expiration Year</label> 
                          <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                       </div>
                    </div>
                  <div class='form-row row'>
                     <div class='col-md-12 error form-group hide' >
                        <div class='alert-danger alert'>Please correct the errors and try
                           again.
                        </div>
                     </div>
                  </div>
                    <div class="form-row row">
                       <div class="col-xs-12 col-lg-12">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                       </div>
                    </div>
                 </form>
                 <form action="{{ url('charge') }}" method="post" id="paypalform" style="display: none">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="package_id" value="{{$pricing->id}}">
                        <div class="col-lg-12 form-group">
                            <label>Amount</label>
                            <input autocomplete="off" class="form-control" type="text" value="{{$pricing->total}}" readonly  name="amount">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-primary btn-lg btn-block submit-button"type="submit" style="margin-top: 10px;">Pay Now</button>
                        </div>
                    </div>
                </form>
                   
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $('input[type=radio][name=paymentStatus]').change(function() {
    if (this.value == 'card') {
        $('#payment-form').css('display','block');
        $('#paypalform').css('display','none');
    }
    else if (this.value == 'paypal') {
      $('#paypalform').css('display','block');
      $('#payment-form').css('display','none');
    }; 
});
</script>
<script type="text/javascript">
    $(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>
@endsection
