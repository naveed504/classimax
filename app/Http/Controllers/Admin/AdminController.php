<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\FAQ;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('is_admin');
    // }
    public function dashboard(){
        $totalUser = User::count();
        $totalPost = Post::count();
        $totalFaq = FAQ::count();
        $totalCategory = Category::count();
        return view('admin.layouts.dashboard', compact('totalUser', 'totalPost', 'totalFaq', 'totalCategory'));
    }
    public function viewProfile(){
        $data = Auth()->user();
        return view('admin.layouts.profile')->with(compact('data'));
    }
    public function update(Request $request, $id){
         
            if($request->password == null){
        $request->validate([
            'name'      => 'required|max:70',
            'email' => 'required|email',
     
        ]);
        $request['password'] = auth()->user()->password;
       

    }else{
       
        $request->validate([
            'name'      => 'required|max:70',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation|min:6',            
        ]);
        $request['password'] = Hash::make($request->password);
    } 
        $user = User::find($id);
        $user->update($request->all());
        return back()->with('success', 'Profile Updated Successfully');
    }

    public function logout(){
        
        Auth::logout();
        return redirect('/');
    }
}
