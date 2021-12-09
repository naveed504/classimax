@extends('front.layouts.app')
@section('content')
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading text-center pb-5">
                    <h2 class="font-weight-bold">Best Price Packages</h2>
                </div>
            </div>
            @foreach ($prices as $price)
                
            <div class="col-lg-3 col-md-4">
                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                    <div class="package-content-heading border-bottom">
                        <i class="fa fa-paper-plane"></i>
                        <h2>{{$price->listing_duration}} Days</h2>
                        {{-- <h4 class="py-3"> <span>${{$price->standard_listing}}</span></h4> --}}
                    </div>
                    <ul>
                        <li class="my-4"> <i class="fa fa-check"></i>Standard Listing(1 img &1 category)${{$price->standard_listing}}</li>
                        <li class="my-4"> <i class="fa fa-check"></i> Each Additional Image ${{$price->each_additional_image}}</li>
                        <li class="my-4"> <i class="fa fa-check"></i>Each Additional category ${{$price->each_additional_category}}</li>
                        <li class="my-4"> <i class="fa fa-check"></i>Additional Duration Days ${{$price->duration_days}}</li>
                        
                    </ul>
                    <a href="{{route('checkout.page', $price->id)}}" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
</section>
@endsection
