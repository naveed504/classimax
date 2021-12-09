@extends('front.layouts.app')
@section('content')
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>{{@$privacyPolicy->title}}</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto p-0">
               <div class="terms-condition-content">
                   <p>{!! @$privacyPolicy->description !!}</p>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection