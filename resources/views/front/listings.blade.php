@extends('front.layouts.app')
@include('front.layouts.navbar')
@section('content')


    <section class="create-list-banner create-list-summary mt-4 text-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="banner-content">
              <div class="overlay float-right mt-2">
                <img
                  class="mt-3"
                  src="../images/emma-watson.png"
                  alt=""
                />
                @auth 
                <p class="">{{auth()->user()->name}}</p>
                @endauth
                @guest 
                <p class=""> Guest Login</p>

                @endguest
                
              </div>
              <div class="col-lg-12">
                <div class="text-center">
                  <div class="d-flex justify-content-start">
                  <form action="{{ route('search.listing.post') }}" method="POST" class="search-wrapper cf form-group">
                            @csrf
                            <div class="serach_div">
                                <i class="fas fa-search"></i>
                                <input  name="name" class="form-control" type="text" placeholder="Search Listings" required style="box-shadow: none">
                            </div>
                            <button class="cstm_btn btn netsearcg" type="submit">Search</button>
                        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="my-listing-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-6">
            <div class="my-listing-summary float-left">
              <label class="float-left pr-3 mt-5 summary-heading"
                >My Listings Summary</label
              >
              <div class="select-category float-left">
                <div class="form-group">
                  <select
                    class="form-control shadow-sm"
                    id="exampleFormControlSelect1"
                  >
                    <option>Sort Listings</option>
                    <option>Active</option>
                    <option>nactive</option>
                    <option>Closed</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="my-listing-summary float-right">
              <div class="select-category">
                <div class="form-group">
                  <select
                    class="form-control shadow-sm"
                    id="exampleFormControlSelect1"
                  >
                    <option>Filter by category</option>
                    <option>Category 2</option>
                    <option>Category 4</option>
                    <option>Category 5</option>
                    <option>Category 6</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
    <section class="my-listing-banner">
      <div class="container ">
        <div class="row">
          <div class="col-md-12">
          @foreach (@$posts as $post)
            <div class="reponsive-table">
              <table
                class="
                  table table-borderless
                  custom-summary-table
                  bg-white
                  shadow-sm
                  text-start
                "
              >
                <thead class="border-bottom p-0">
                  
                  <tr class="text-start ">
                    <th scope="col">ID</th>
                    <th class="custom-th pr-5" scope="col">Title</th>
                    <th scope="col">Posting Date</th>
                    <th scope="col">Cloased Date</th>
                    <th scope="col">Category</th>
                  </tr>
                </thead>
              
            
                <tbody class="mt-2">
                    
             
                
               <tr >
                 <td scope="row">{{$post->id}}</td>
                 <td>
                   <img
                     class="img-fluid  pr-3 float-left"
                     src="{{ asset('picture/' . $post->image) }}"
                     alt=""
                     style="width:100px;"
                   />
                   <p>{{ $post->title }}</p>
                 </td>
                 <td>{{ date('d-M-Y', strtotime($post->created_at)) }}</td>
                 <td>{{ date('d-M-Y', strtotime($post->expire_date)) }}</td>
               
                 <td>{{$post->category->name}}</td>
                
                 <td class="custom-column"><i class="fas fa-trash-alt pr-3"></i></td>
                 <td class="custom-column"><i class="fas fa-eye pl-3"></i></td>
               </tr>
              
               
             </tbody>
              
             
              </table>
            </div>
            @endforeach
           
           
            
            
            
          </div>
        </div>
      </div>
      <div class="container pagi" style="margin-top: -25px; padding-bottom: 20px;">
        <!-- <div class="row">
            <div class="col-12 text-md-right text-center">
                <ul class="pagination modal-4">
                    <li><a href="#" class="prev active">
                            <i class="fas fa-long-arrow-alt-left"></i>
                            Prev
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li class="showhide2"><a href="#" class="">2</a></li>
                    <li class="showhide2"> <a href="#" class="">3</a></li>
                    <li class="showhide"> <a href="#" class="">4</a></li>
                    <li class="showhide"> <a href="#" class="active ">5</a></li>
                    <li class="showhide"> <a href="#" class="">6</a></li>
                    <li class="showhide"> <a href="#" class="">7</a></li>
                    <li class="showhide2"> <a href="#">...</a></li>
                    <li class="showhide"> <a href="#">20</a></li>
                    <li><a href="#" class="next active"> Next
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a></li>
                </ul><br>
            </div>
        </div> -->
        <div class="container pagi">
            <div class="row">

                {{ $posts->links('front.layouts.pagination') }} 

            </div>
        </div>
    </div>
    </section>
@endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@section('custom-js')

@endsection
