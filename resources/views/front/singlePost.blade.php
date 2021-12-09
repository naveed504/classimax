@extends('front.layouts.app')

@section('content')

    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{ $post->title }}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item text-capitalize"><i class="fa fa-user-o"></i> By
                                    {{ $post->user->name }}</li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                                        href="">{{ $post->category->name }}</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Expire Date<a
                                        href="">{{ date('d-M-Y', strtotime($post->expire_date)) }}</a></li>
                            @if (Route::has('login'))
                            @auth
                                <li class="list-inline-item">
                                    <a class="nav-link text-white add-button" style="cursor: pointer" data-toggle="modal"
                                    data-target="#exampleModalCenter"><i class="fa fa-plus-circle"></i> Report</a>
                                </li>
                                @else
                                <li class="list-inline-item">
                                    <a class="nav-link text-white add-button" style="cursor: pointer" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Report</a>
                                </li>
                            @endauth
                            @endif

                            </ul>
                        </div>

                        <!-- product slider -->
                        @if (count($post->gallery) > 0)
                            <div class="product-slider">
                                @foreach ($post->gallery as $img)

                                    <div class="product-slider-item my-4"
                                        data-image="{{ asset('images/' . $img->images) }}">
                                        <img class="img-fluid w-100" src="{{ asset('images/' . $img->images) }}">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row my-4" style="justify-content: center">
                                <img class="img-fluid my-3" width="400"
                                    src="{{ asset('picture/' . $post->image) }}"
                                    alt="">
                            </div>
                        @endif

                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Specifications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                        href="#pills-contact" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Product Description</h3>
                                    <p>{{ $post->description }}</p>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Product Specifications</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                            <tr>
                                                <td>Seller Price</td>
                                                <td>$450</td>
                                            </tr>
                                            <tr>
                                                <td>Added</td>
                                                <td>26th December</td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td>Dhaka</td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>Apple</td>
                                            </tr>
                                            <tr>
                                                <td>Condition</td>
                                                <td>Used</td>
                                            </tr>
                                            <tr>
                                                <td>Model</td>
                                                <td>2017</td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td>Dhaka</td>
                                            </tr>
                                            <tr>
                                                <td>Battery Life</td>
                                                <td>23</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <h3 class="tab-title">Product Review</h3>
                                    <div class="product-review">
                                        <div class="media">
                                            <!-- Avater -->
                                            <img src="images/user/user-thumb.jpg" alt="avater">
                                            <div class="media-body">
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="name">
                                                    <h5>Jessica Brown</h5>
                                                </div>
                                                <div class="date">
                                                    <p>Mar 20, 2018</p>
                                                </div>
                                                <div class="review-comment">
                                                    <p>
                                                        The quick brown fox jumps over the lazy dog. The quick brown fox jumps over the lazy dog.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-submission">
                                            <h3 class="tab-title">Submit your review</h3>
                                            <!-- Rate -->
                                            <div class="rate">
                                                <div class="starrr"></div>
                                            </div>
                                            <div class="review-submit">
                                                <form action="#" class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="review" id="review" rows="10" class="form-control"
                                                            placeholder="Message"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-main">Sumbit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Price</h4>
                            <p>${{ $post->price }}</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                            <h4><a href="">Jonathon Andrew</a></h4>
                            <p class="member-time">Member Since Jun 27, 2017</p>
                            <a href="">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href=""
                                        class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a>
                                </li>
                                <li class="list-inline-item"><a href=""
                                        class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
                                        offer</a></li>
                            </ul>
                        </div>
                        <!-- Map Widget -->
                        <div class="widget map">
                            <div class="map">
                                <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
                            </div>
                        </div>
                        <!-- Rate Widget -->
                        <div class="widget rate">
                            <!-- Heading -->
                            <h5 class="widget-header text-center">What would you rate
                                <br>
                                this product
                            </h5>
                            <!-- Rate -->
                            <div class="starrr"></div>
                        </div>
                        <!-- Safety tips widget -->
                        <div class="widget disclaimer">
                            <h5 class="widget-header">Safety Tips</h5>
                            <ul>
                                <li>Meet seller at a public place</li>
                                <li>Check the item before you buy</li>
                                <li>Pay only after collecting the item</li>
                                <li>Pay only after collecting the item</li>
                            </ul>
                        </div>
                        <!-- Coupon Widget -->
                        <div class="widget coupon text-center">
                            <!-- Coupon description -->
                            <p>Have a great product to post ? Share it with
                                your fellow users.
                            </p>
                            <!-- Submii button -->
                            <a href="" class="btn btn-transparent-white">Submit Listing</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" class="forhide" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-body backimg bg-3">

                        <div class="px-3 to-front">
                            <div class="row align-items-center">
                                <div class="col text-right">
                                    <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><span class="icon-close2"></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 to-front">
                            <div class="text-center">

                                <h3>{{ $post->title }}</h3>

                                <p class="mb-4">Category: {{ $post->category->name }} </p>
                                <form id="reportform" method="POST" class="mb-4">
                                    @csrf
                                    <div class="successReportMsg"></div>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="user_id" value="{{ $post->id }}">
                                    <input type="hidden" name="post_user_email" value="{{ $post->user->email }}">

                                    <input type="hidden" name="category_id" value="{{ $post->category->id }}">
                                    <div class="form-group">
                                        <textarea type="text" name="description" class="form-control w-100 mr-3"
                                            placeholder="Report Here"></textarea>
                                    </div>
                                    <div class="mt-1">
                                        <li class="alert alert-success" style="display: none;" id="succ"
                                            style="list-style-type:none">Description is required</li>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" id="submitForm" class="btn btn-primary  btn-block">Report</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

@endsection
@section('custom-js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '#submitForm', function(e) {
                e.preventDefault();
                var reportForm = $('#reportform');
                var formData = reportForm.serialize();

                $.ajax({
                    url: '/submit/report',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        if (data.success == 1) {
                            $("#reportform").get(0).reset();
                            $('.successReportMsg').append(
                                "<p class='alert alert-success'>Report Submitted</p>");
                            setInterval(function() {
                                $("#exampleModalCenter").modal('hide');
                                location.reload();
                            }, 2000);



                        }
                        if (data.query == 0) {
                            document.getElementById('succ').style.display = "block";
                        }

                    }
                })
            })

        });
    </script>
@endsection
