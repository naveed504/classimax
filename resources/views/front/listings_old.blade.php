@extends('front.layouts.app')
@section('content')

<section class="section-sm">
    <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Category</h4>
                            <ul class="category-list">
                                 @if (@$categories)
                                 @foreach ($categories as $category)
                                 <li><a href="{{route('post.with.category', $category->id)}}">{{ $category->name }}
                                         <span>{{ $category->posts->count() }}</span></a></li>
                                @endforeach
                                 @endif
                              

                            </ul>
                        </div>

                    </div>
                </div>
               
                <div class="col-md-9">
                    <div class="category-search-filter">
                        <form action="{{route('sort.listing')}}" method="POST">
                            @csrf
                        <div class="row">
                            
                            <div class="col-md-6">
                                <strong>Sort By</strong>
                                
                                <select id="sortlisting" name="sortlisting" onchange="this.form.submit()" class="form-control">
                                <option  value="category" {{@$selectcategory ? 'selected' : ''}}>Category</option> 
                                 <option value="expireDate"  {{ @$selectexpire ? 'selected' : '' }} >Expiration Date</option>
                                
                                </select>
                            
                            </div>
                       
                            <div class="col-md-6">

                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            @foreach (@$posts as $post)

                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">
                                                <!-- <div class="price">$200</div> -->
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    <img class="card-img-top img-fluid"
                                                        src="{{ asset('picture/' . $post->image) }}" alt="Card image cap" style="height:155px;">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="single.html">{{ $post->title }}</a>
                                                </h4>
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
                                                <p class="card-text">{{ Str::limit($post->description, 60) }}</p>
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
                  
                   @if (@$selectcategory OR @$selectexpire)
                  @else
                  <div class="pagination justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item">{!! $posts->links('pagination::bootstrap-4') !!}</li>

                        </ul>
                    </nav>
                </div>
                   @endif
                   
                 
        
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('custom-js')

@endsection
