@extends('front.layouts.app')
@include('front.layouts.header')
@section('content')

    <section class="web_body">
        <div class="container">
            <div class="row listing">
                <div class="col-xl-3 col-lg-4 col-md-4 col-12 pt-md-0 pt-3">
                    <p class="commut pt-md-2 pt-0">Community Classifieds</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 pt-md-0 pt-3">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <form action="{{route('sort.listing')}}" method="POST">
                                @csrf
                                <input type="hidden" name="test" value="other">
                                
                                <select id="sortlisting" name="sortlisting" onchange="this.form.submit()" class="form-control">
                                    <option  value="category" {{@$selectcategory ? 'selected' : ''}}>Category</option> 
                                    <option value="expireDate"  {{ @$selectexpire ? 'selected' : '' }} >Expiration Date</option>
                                    
                                </select>
                                
                               
                        </form>
                        </div>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-4 col-lg-4 col-md-4 col-12 pt-md-0 pt-3 pr-md-4 pr-3">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-10 col-12">
                            <form action="{{route('sort.listing')}}" method="POST">
                                @csrf
            
                                <input type="hidden" name="test" value="sortbycategory">
                                <select id="category" name="category" onchange="this.form.submit()" class="form-control">
                                    <option>Select Categories</option>
                                    <option value="-1">All Categories</option>
                                    @foreach ($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            
            @foreach (@$posts as $post)
            <div class="col-12 px-md-3 px-0 pt-4">
                <div class="container-fluid detailsbox mt-0">
                <div class="row">
                    <div class="col-lg-3  col-sm-8 col-12  px-md-0 px-0">
                        <div class="img-div">
                            <img src="{{ asset('picture/' . $post->image) }}" class="detail-img" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-12 pt-3">
                        <div class="row">
                            <div class="col-12 d-md-flex justify-content-between d-block">
                                <div>
                                    <p class="listteat"><span class="listhrading">ID :
                                        </span>{{ $post->id }}</p>
                                    <p class="listteat">{{ $post->user->name }}</p>
                                </div>
                                <div>
                                    <p class="datesty">Expiration Date <span class="current_date">
                                            {{ date('d-M-Y', strtotime($post->expire_date)) }}</span></p>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between align-items-end">
                                <div>
                                    <p class="mn_deatil">{{ $post->title }}</p>
                                    <button class="btn view_byt" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$post->id}}"> View</button>
                                </div>
                                <div>

                                    <p class="report"><a href=""><img
                                                src="{{ asset('front/images/flag.png') }}" alt=""> Report</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            </div>




        </div>
        <div class="container pagi">
            <div class="row">

                {{ $posts->links('front.layouts.pagination') }} 

            </div>
        </div>
       
        <section>
            <div class="container">	
                <div class="row">
                    <div class="col-12">
		
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
				  <div class="mb-5" >
					<img class="d-block w-100" src="{{asset('picture/'.$activeSiglebanner->image)}}"   alt="First Banner">
				</div>
				    @endif
				</div>
			</div>
			

		@endif
                </div>
            </div>
        </div>
		
	   </section>
    </section>
  



    @foreach ($posts as $post)
    <div class="modal fade" id="exampleModalCenter{{$post->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered view_cate_gory_pop" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-ad_view" id="exampleModalLongTitle">Listing View</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{asset('front/images/close.png')}}" width="26" height="26"
                                alt=""></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="view_ad_left1">
                        <div class="pd-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="slider{{$post->id}}" class="owl-carousel product-slider">
                                           
                                            @foreach ($post->gallery as  $gallery)
                                                
                                            
                                            <div class="item">
                                                <img
                                                src="{{ asset('images/'.$gallery->images) }}" />
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                        <div id="thumb{{$post->id}}" class="owl-carousel product-thumb mt-3">
                                            @foreach ($post->gallery as  $gallery)
                                                
                                            
                                            <div class="item">
                                                <img
                                                src="{{ asset('images/'.$gallery->images) }}" />
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     
                    <div class="col-md-12">
                        <div class="">
                            <div class="product-content">
                                <div class="id_label_ad">ID: </div>
                                <div class="id_label_ad">{{ $post->user->name }}</div>
                                <div class="category_label_ad">{{ $post->category->name }}</div>
                                <h2 class="product-title">{{ $post->title }}</h2>
                                <a href="#" class="product-link">visit nike store</a>
                                <div class="product-detail">

                                    <p>{{ $post->description }}
                                    </p>
                                </div>
                            </div>

                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer display-block">
                    <div class="float-left cate_gory_expire_Date"><strong>Expiration Date :</strong> {{ date('d-M-Y', strtotime($post->expire_date)) }}
                    </div>

                    <button type="button" class="btn btn-primary float-right btn_view_Ad_close"
                        data-dismiss="modal" aria-label="Close">Close</button>
                    <button type="button" class="btn float-right"><img src="{{asset('front/images/report_icon.png')}}"
                            width="18" height="23" alt=""> Report</button>

                </div>
            </div>
        </div>
    </div>

    @endforeach


    <!-- Modal -->
    

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


            @foreach ($posts as $post)
                 <script>
                $(document).ready(function () {
                    var slider = $("#slider{{$post->id}}");
                    var thumb = $("#thumb{{$post->id}}");
                    var slidesPerPage = 4; //globaly define number of elements per page
                    var syncedSecondary = true;
                    slider
                        .owlCarousel({
                            items: 1,
                            slideSpeed: 2000,
                            nav: false,
                            autoplay: false,
                            dots: false,
                            loop: true,
                            responsiveRefreshRate: 200
                        })
                        .on("changed.owl.carousel", syncPosition);
                    thumb
                        .on("initialized.owl.carousel", function () {
                            thumb.find(".owl-item").eq(4).addClass("current");
                        })
                        .owlCarousel({
                            items: slidesPerPage,
                            dots: false,
                            nav: true,
                            item: 4,
                            smartSpeed: 200,
                            slideSpeed: 500,
                            slideBy: slidesPerPage,
                            navText: [
                                '<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                                '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                            ],
                            responsiveRefreshRate: 100
                        })
                        .on("changed.owl.carousel", syncPosition2);
                    function syncPosition(el) {
                        var count = el.item.count - 1;
                        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
                        if (current < 0) {
                            current = count;
                        }
                        if (current > count) {
                            current = 0;
                        }
                        thumb
                            .find(".owl-item")
                            .removeClass("current")
                            .eq(current)
                            .addClass("current");
                        var onscreen = thumb.find(".owl-item.active").length - 1;
                        var start = thumb.find(".owl-item.active").first().index();
                        var end = thumb.find(".owl-item.active").last().index();
                        if (current > end) {
                            thumb.data("owl.carousel").to(current, 100, true);
                        }
                        if (current < start) {
                            thumb.data("owl.carousel").to(current - onscreen, 100, true);
                        }
                    }
                    function syncPosition2(el) {
                        if (syncedSecondary) {
                            var number = el.item.index;
                            slider.data("owl.carousel").to(number, 100, true);
                        }
                    }
                    thumb.on("click", ".owl-item", function (e) {
                        e.preventDefault();
                        var number = $(this).index();
                        slider.data("owl.carousel").to(number, 300, true);
                    });

                    $(".qtyminus").on("click", function () {
                        var now = $(".qty").val();
                        if ($.isNumeric(now)) {
                            if (parseInt(now) - 1 > 0) {
                                now--;
                            }
                            $(".qty").val(now);
                        }
                    });
                    $(".qtyplus").on("click", function () {
                        var now = $(".qty").val();
                        if ($.isNumeric(now)) {
                            $(".qty").val(parseInt(now) + 1);
                        }
                    });
                });

            </script>
        @endforeach



</body>

</html>
