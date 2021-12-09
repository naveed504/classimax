<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function termsOfUse(){

        $data = Page::where('type','termsOfUse')->first();
        return view('admin.pages.termsOfUse', compact('data'));
    }
    
    public function privacyPolicy(){
        $data = Page::where('type','privacyPolicy')->first();
        return view('admin.pages.privacyPolicy', compact('data'));
    }

    public function acceptableUsePolicy(){
        $data = Page::where('type','acceptableUsePolicy')->first();
        return view('admin.pages.acceptableUsePolicy', compact('data'));
    }
    
    public function store(Request $request){
        
        $id = $request->id;
        $data = Page::find($id);
        $data->title = $request->title;
        $data->type = $request->type;
        $data->description = $request->description;
        $data->save();
        return back()->with('success', 'Page Updated Successfully');
   
}

}