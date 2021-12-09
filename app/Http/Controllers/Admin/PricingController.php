<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing = Pricing::get();
        return view('admin.pricing.index', compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.pricing.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        //  Pricing::create($request->all());
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pricing = Pricing::find($id);
      $prices = Pricing::get();
      return view('admin.pricing.edit', compact('pricing', 'prices'));
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
            // 'listing_duration'  => 'required',
            'standard_listing'      => 'required',
            'each_additional_image' => 'required',
            'each_additional_category' => 'required',
            'duration_days' => 'required',
            
        ]);
          $pricing = Pricing::find($id);
          $pricing['total'] = $request->standard_listing + $request->each_additional_image + $request->each_additional_category + $request->duration_days;
          if ($pricing->update($request->all())) {
            return back()->with('success', 'Price Updated Successfully');
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
        //
    }
}
