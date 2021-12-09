@extends('front.layouts.app')
@section('content')

    <section class="section-sm">
        <div class="container">
            @include('front.layouts.searchBar')
            <div class="row">
                {{-- <div class="col-md-3">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach ($categories as $category)
                                <li><a href="category.html">{{ $category->name }}
                                        <span>{{ $category->posts->count() }}</span></a></li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div> --}}
                <div class="col-md-9">
                    <div class="category-search-filter">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Short</strong>
                                <select>
                                    <option>Most Recent</option>
                                    <option value="1">Most Popular</option>
                                    <option value="2">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            @foreach ($searchListing as $post)

                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">
                                                <!-- <div class="price">$200</div> -->
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    <img class="card-img-top img-fluid"
                                                        src="{{ asset('picture/' . $post->image) }}" alt="Card image cap"
                                                        style="width:255px; height:200px">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="single.html">{{ $post->title }}</a>
                                                </h4>

                                                <ul class="list-inline product-meta">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i
                                                                class="fa fa-folder-open-o"></i>{{ @$post->category->name }}</a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a href="#"><i
                                                                class="fa fa-calendar"></i>{{ date('d-M-Y', strtotime($post->expire_date)) }}</a>
                                                    </li>
                                                </ul>
                                                <p class="card-text">
                                                    {{ Str::limit($post->description, 80) }}
                                                </p>
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
        </div>
    </section>

@endsection

