

@extends('front.layouts.app')

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
            <div class="row">
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
                                                    data-target="#exampleModalCenter"> View</button>
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
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered view_cate_gory_pop" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title modal-title-ad_view" id="exampleModalLongTitle">Listing View</h5>
                                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><img src="{{ asset('front/images/close.png') }}"
                                                width="26" height="26" alt=""></span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="view_ad_left1">
                                        <div class="card-wrapper">
                                            <div class="card">
                                                <!-- card left -->
                                                <div class="product-imgs">
                                                    <div class="img-display">
                                                        <div class="img-showcase">
                                                           
                                                            <img src="{{ asset('front/images/view_ad1.jpg') }}" alt="">
                                                            <img src="{{ asset('front/images/hotel2.jpg') }}" alt="">
                                                            <img src="{{ asset('front/images/view_ad1.jpg') }}" alt="">
                                                            <img src="{{ asset('front/images/hotel2.jpg') }}" alt="">


                                                        </div>
                                                        <div class="img-select">
                                                            <div class="img-item">
                                                                <a href="#" data-id="1" class="ad_view_arrow_left"><img
                                                                        src="{{ asset('front/images/ad_view_arrow_left.png') }}"
                                                                        alt=""></a>
                                                                <a href="#" data-id="2" class="ad_view_arrow"><img
                                                                        src="{{ asset('front/images/ad_view_arrow.png') }}"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="img-select">
                                                        <div class="img-item">
                                                            <a href="#" data-id="1">
                                                                <img src="{{ asset('front/images/view_ad1.jpg') }}"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div class="img-item">
                                                            <a href="#" data-id="2">
                                                                <img src="{{ asset('front/images/hotel2.jpg') }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="img-item">
                                                            <a href="#" data-id="3">
                                                                <img src="{{ asset('front/images/hotel3.jpg') }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="img-item">
                                                            <a href="#" data-id="4">
                                                                <img src="{{ asset('front/images/hotel4.jpg') }}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card right -->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="view_ad_right2">
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
                                <div class="modal-footer display-block">
                                    <div class="float-left cate_gory_expire_Date"><strong>Expiration Date :</strong>
                                        {{ date('d-M-Y', strtotime($post->expire_date)) }}</div>
                                    <button type="button" class="btn btn-primary float-right btn_view_Ad_close"
                                        data-dismiss="modal" aria-label="Close">Close</button>
                                    <button type="button" class="btn float-right"><img
                                            src="{{ asset('front/images/report_icon.png') }}" width="18" height="23"
                                            alt=""> Report</button>

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

            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12 text-center">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}


        <!-- Container End -->

        <div class="container">
            <div class="row">
                @if (count($activeMultipleBanners) > 1)
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach (@$activeMultipleBanners as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="cup_key" src="{{ asset('picture/' . $banner->image) }}"
                                        alt="First Banner">
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
                    <div class="col-12">
                        @if (isset($activeSiglebanner))
                            <div>
                                <img src="{{ asset('picture/' . $activeSiglebanner->image) }}" class="cup_key"
                                    alt="">
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;
    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {

        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }
    window.addEventListener('resize', slideImage);
</script>