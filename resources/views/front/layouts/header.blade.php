<section class="header">
    
                @include('front.layouts.navbar')
                
          
    <div class="container">
        <div class="row">
            <div class="col-12 Search_div">
                <div class="text-center">
                    <h1 class="by_sell">Buy & Sell Near You</h1>
                    <p class="by_selltext">Join the millions who buy and sell from each other
                        everyday in local communities around the world</p>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('search.listing') }}" method="POST" class="search-wrapper cf form-group">
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
</section>