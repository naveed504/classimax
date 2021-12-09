<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use DB;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category','gallery')->orderBy('id', 'desc')->where('status' ,'=' ,1)->paginate(3);
        $activeMultipleBanners = Banner::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $activeSiglebanner = Banner::where('status', 1)->first();
        $categories = Category::with('children', 'posts')->get();
    
        return view('front.home', compact('posts', 'categories', 'activeSiglebanner', 'activeMultipleBanners'));
    }

    public function getSinglePost($id)
    {

        $post = Post::where('id', $id)->with('category', 'gallery')->first();
        return view('front.singlePost', compact('post'));
    }
    public function listings()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(6);; 
        
        $categories = Category::with('children', 'posts')->get();
        return view('front.listings', compact('posts', 'categories'));
    }
    public function searchListingPost(Request $request)
    {   
        $searchListingCat = Category::where('name', 'like', '%' . $request->category . '%')->pluck('id');
        $posts = Post::with('category','gallery')
            ->where('title', 'like', '%' . $request->name . '%')
            ->whereIn('category_id', $searchListingCat)->paginate(10);
        $categories = Category::with('children', 'posts')->get();
    
        return view('front.listings', compact('posts', 'categories'));
    }

    public function searchListing(Request $request)
    {   
        $searchListingCat = Category::where('name', 'like', '%' . $request->category . '%')->pluck('id');
        $posts = Post::with('category','gallery')
            ->where('title', 'like', '%' . $request->name . '%')
            ->whereIn('category_id', $searchListingCat)->paginate(2);
        $activeMultipleBanners = Banner::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $activeSiglebanner = Banner::where('status', 1)->first();
        $categories = Category::with('children', 'posts')->get();
    
        return view('front.home', compact('posts', 'categories', 'activeSiglebanner', 'activeMultipleBanners'));
    }

    public function postWithCategory($id)
    {
        $posts = Post::with('category','gallery')->where('category_id', $id)->paginate(6);
        $categories = Category::with('children', 'posts')->get();
        return view('front.listings', compact('posts', 'categories'));
    }
    public function sortListing(Request $request)
    {   

       

        $date =  date('Y-m-d H:i:s');
        $categories = Category::with('children', 'posts')->get();
        $activeMultipleBanners = Banner::orderBy('id', 'desc')->where('status', '=', 1)->get();
        $activeSiglebanner = Banner::where('status', 1)->first();
        $categories = Category::with('children', 'posts')->get();

        
        if($request->test == "sortbycategory"){
            $cat = Category::with('parent')->find($request->category);
           if($cat->parent == ''){
            $posts = Post::with('category')->where('category_id', '=', $cat->id)->where('status', '=', '1')->paginate(6);
               

           }else{
              
           }
           
            $posts = Post::with('category')->where('category_id', '=', $cat->id)->where('status', '=', '1')->paginate(6);
           
          
            
            if($request->category == '-1'){
                
                return Redirect()->route('home');

            }else{
            $posts = Post::with('category','gallery')->where('category_id', '=', $request->category)->where('status', '=', '1')->paginate(3); 
            return view('front.home', compact('posts', 'categories', 'activeSiglebanner', 'activeMultipleBanners'));
            }
        }else{

    
        if ($request->sortlisting == 'expireDate') {
            
            $posts = Post::with('category','gallery')->where('expire_date', '>', $date)->where('status', '=', '1')->orderBy('expire_date', 'asc')->paginate(3);
            $selectexpire = true;


            return view('front.home', compact('posts', 'categories', 'activeSiglebanner', 'activeMultipleBanners'));
        }
        
        if ($request->sortlisting == 'category') {
            
            $posts = Post::with('category','gallery')->where('status', '=', 1)->orderBy('id', 'desc')->paginate(3);
            $selectcategory = true;

            
            return view('front.home', compact('posts', 'categories', 'activeSiglebanner', 'activeMultipleBanners'));
        }
        }
     
        //   $posts = Post::with('category')
        //   ->when($request->sortlisting == 'expireDate', function($q) use ($date , $request){
        //    $q->where('expire_date', '>', $date)->orderBy('expire_date', 'asc')->paginate(6);
        //   })
        //   ->when($request->sortlisting == 'category' , function($q){
        //     $q->orderBy('id', 'desc')->paginate(6);
        //   })->paginate(6);
         

    }
}
