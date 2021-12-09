<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\RequestStack;

class BannerController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->status === 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $request->validate([
            'title'      => 'required|max:70',
            'image' => 'required',

        ]);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->status = $status;
        $banner->image = $this->verifyAndUpload($request, 'image');
        if ($banner->save()) {
            return back()->with('success', 'Banner added Successfully');
        } else {
            return back()->with('success', 'Error in adding Banner');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idd)
    {
        //
    }
    public function statusChange(Request $request)
    {

        $id = $request->id;
        $banner = Banner::find($id);
        $tt = $banner->status;
        if ($tt == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        DB::table('banners')
            ->where('id', $id)
            ->update(['status' => $status]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
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
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->title;
        if($request->hasfile('image')){
            $banner->image = $this->verifyAndUpload($request, 'image');
        }
        if ($banner->save()) {
            return back()->with('success', 'Banner Updated Successfully');
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
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner Deleted successfully.');
    }
}
