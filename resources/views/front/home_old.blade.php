@extends('front.layouts.app')
<style>
    .pagination {
        justify-content: center;
    }

</style>
@section('content')
    <section class="hero-area bg-1 text-center overly" style="background-attachment:fixed;">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Buy & Sell Near You </h1>
                        <p>Join the millions who buy and sell from each other <br> everyday in local communities around the
                            world</p>
                        <div class="short-popular-category-list text-center">
                            <h2>Popular Category</h2>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-bed"></i> Hotel</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-car"></i> Cars</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Advance Search -->
                    @include('front.layouts.searchBar')

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="popular-deals section bg-gray">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Explore Our Featured Listings</h2>
                        <p>Check out the top area businesses</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        @foreach (@$posts as $post)
                            <div class="col-sm-12 col-lg-4">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card shadow">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('picture/' . $post->image) }}" alt="Card image cap"
                                                    style="width:500px; height:250px;">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="single.html">{{ $post->title }}</a></h4>
                                            <ul class="list-inline product-meta">
                                                <li class="list-inline-item">
                                                    <a href="single.html"><i
                                                            class="fa fa-folder-open-o"></i>{{ $post->category->name }}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#"><i
                                                            class="fa fa-calendar"></i>{{ date('d-M-Y', strtotime($post->expire_date)) }}</a>
                                                </li>
                                            </ul>
                                            <p class="card-text">{{ Str::limit($post->description, 40) }}</p>
                                            <div class="product-ratings">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="section" id="sectionc">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
                    </div>
                    <div class="row" id="table_data">
                        <!-- Category list -->
                        @foreach (@$categories as $category)
                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                                <div class="category-block" style="height:350px;">
                                    <div class="header">
                                        <a href="{{route('post.with.category', $category->id)}}">
                                        <i class="fa fa-laptop icon-bg-1"></i>
                                        <h4>{{ $category->name }}</h4>
                                    </a>
                                    </div>
                                    <ul class="category-list">
                                        @foreach (@$category->children as $child)
                                            <li><a href="{{route('post.with.category', $child->id)}}">{{ $child->name }}
                                                    <span>{{ $child->posts->count() }}</span></a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <!-- Container End -->
    </section>
     
	
	<section style="mb-3">
		
		@if ( count($activeMultipleBanners) > 1)
			
				
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@foreach (@$activeMultipleBanners as $key => $banner)
				  <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
					<img class="d-block w-100" src="{{asset('picture/'.$banner->image)}}"  height="400" alt="First Banner">
				  </div>
				  @endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
			  </div>
			
			@else 
		  
			<div id="" class=" call-to-action overly bg-3" data-ride="carousel">
				<div class="">
					@if(isset($activeSiglebanner))
				  <div class="">
					<img class="d-block w-100" src="{{asset('picture/'.$activeSiglebanner->image)}}"  height="300" alt="First Banner">
				</div>
				    @endif
				</div>
			</div>
			

		@endif
		
	</section>

	
	
	<section class="call-to-action overly bg-3 section-sm" style="">
		<!-- Container Start -->
		<div class="container ">
			<div class="row justify-content-md-center text-center">
				<div class="col-md-8">
				
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section> --}}


@endsection
