<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Payment;
use App\Models\Pricing;
use App\Models\Report;
use App\Traits\ImageTrait;
use Auth;
use DB;

class PostController extends Controller
{
    use ImageTrait;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->where('isDraft', '0')->get();
        return view('admin.posts.index', compact('posts'));
    }
      
    public function storePremiumListingImages(Request $request){
    echo '<pre>';    print_r($_FILES); exit('files');
        // $this->validate($request, [
        //     'images' => 'required'
        // ]);
     if( $request->has('images')){
           dd('working');
        $file = $request->file('images');
        dd($file);
    //      $extension = $request->file('images[]')->getClientOriginalName();
    //      $filename = time() . '.' . $extension;
    //      $file->move('picdemo/', $filename);
           
     }

   



    //    foreach($request->images as $img){

        if ($request->hasFile('images')) {
            // dd('hhhhh');
            foreach($request->file('images') as $key => $file)
            {
  // $file = array();
//   $file = $request->file('images');
  //  dd($file);
  $extension = $file->getClientOriginalName();
  $filename = time() . '.' . $extension;
  $file->move('picdemo/', $filename);
  // $product->image = $filename;
  dd('file save successfully');
            }
          
        } else {
            dd('file not save');
            return $request;
            // $product->image = '';
        }
    //    }
    } 
    public function draftPosts()
    {
        $posts = Post::with('category')->where('isDraft', '1')->get();
        return view('admin.posts.drafts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole(['Admin'])){
            $categories = Category::with('parent')->get();
            return view('admin.posts.add', compact('categories'));
        }else{

        $uid = Auth::user()->id;
        $user = Payment::where('user_id' , $uid)->get();
        $posts = Post::where('user_id' , $uid)->get();
        

        if(count($posts) == 0){    
            $categories = Category::with('parent')->get();
            return view('admin.posts.add', compact('categories'));
        }else if( count($posts) > 0  && count($user) < 1){
            $prices = Pricing::get();
            return view('front.package', compact('prices'));    
        }else if( count($posts) > 0  && count($user) > 0){
            $categories = Category::with('parent')->get();
            return view('admin.posts.add', compact('categories'));
        }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|max:70',
            'category_id' => 'required',
            'price' => 'required',
            'expire_date' => 'required|after:today',
            'image' => 'required',
            'description' => 'required|max:1000',

        ]);

    
        $post = new Post();
        if($request->draft) {
            $post->isDraft = 1;
        } else if($request->save) {
            $post->isDraft = 0;
        }
        $post->title = $request->title;
        $post->price = $request->price;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->expire_date = $request->expire_date;
        $post->description = $request->description;
        $post->image = $this->verifyAndUpload($request, 'image');
        if ($post->save()) {
            return redirect()->route('post.index')->with('success', 'Post Saved Successfully');
        } else {
            return back()->with('success', 'Error in adding Post');
        }
    }
    function upload(Request $request, $id)
    {

        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $gallery = new Gallery();
        $gallery->images = $imageName;
        $gallery->post_id = $id;
        $gallery->save();
        return response()->json(['success' => $imageName]);
    }
    function fetch(Request $request)
    {


        $gallery = Gallery::where('post_id', $request->id)->get();

        $images = \File::allFiles(public_path('images'));
        $output = '<div class="row">';

        foreach ($gallery as $image) {

            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="' . asset('images/' . $image->images) . '" class="img-thumbnail" width="155" height="155" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" data-id="' . $image->id . '" id="' . $image->images . '">Remove</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }
    function delete(Request $request)
    {

        if ($request->get('name')) {
            Gallery::find($request->id)->delete();
            \File::delete(public_path('images/' . $request->get('name')));
            return response()->json([
                'msg' => 'Deleted Successful'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(Auth::user()->hasRole(['Admin'])){
            $post = Post::find($id);
            return view('admin.posts.gallery', compact('post'));
        }else{

            $uid = Auth::user()->id;
            $user = Payment::where('user_id' , $uid)->get();
            if(count($user) > 0){
                $post = Post::find($id);
                return view('admin.posts.gallery', compact('post'));
            }else{
                $prices = Pricing::get();
                return view('front.package', compact('prices'));    
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        // dd($this->user);

        $post = Post::find($id);
        if($post->user_id == $this->user->id OR $this->user->hasRole('Admin')){
            $category = Category::find($post->category_id);
            $categories = Category::with('parent')->get();
            return view('admin.posts.edit', compact('post', 'categories', 'category'));
        }
        return redirect()->back();
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
    
        $request->validate([
            'title'      => 'required|max:70',
            'price'      => 'required',
            'category_id' => 'numeric',
            'expire_date' => 'required|after:today',
            'description' => 'required|max:1000',
        ]);

        $post = Post::find($id);
        if($request->draft){
            $post->isDraft = 1;
        }
        else if($request->save){
            $post->isDraft = 0;
        }
        $post->title = $request->title;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->expire_date = $request->expire_date;
        $post->description = $request->description;
        if($request->hasfile('image')){
            $post->image = $this->verifyAndUpload($request, 'image');
        }
        if ($post->update($request->all())) {
            return redirect()->route('post.index')->with('success', 'Post Updaed Successfully');
        } else {
            return back()->with('error', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post Deleted Successfully');
    }

    public function poststatusChange(Request $request)
    { 
        $id = $request->id;
        $post = Post::find($id);
        $tt = $post->status;
        if ($tt == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        DB::table('posts')
            ->where('id', $id)
            ->update(['status' => $status]);
    }
}
