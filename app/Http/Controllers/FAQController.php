<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FAQ::get();
        return view('admin.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.add');
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
            'question'      => 'required',
            'answer' => 'required'

        ]);

        
       
        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if ($faq->save()) {
            return back()->with('success', 'FAQ added Successfully');
        } else {
            return back()->with('success', 'Error in adding FAQ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $faq = FAQ::find($id);
            return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question'      => 'required',
            'answer'      => 'required'
        ]);

        $faq = FAQ::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        if ($faq->update($request->all())) {
            return back()->with('success', 'FAQ Updated Successfully');
        } else {
            return back()->with('error', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FAQ::find($id)->delete();
        return back()->with('success', 'FAQ Deleted Successfully');
    }
}
