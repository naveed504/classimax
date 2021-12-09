<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Mail;
use Auth;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application = Application::get();
        return view('admin.applications.index', compact('application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Application::where('user_id', auth()->user()->id)->select('id')->first();
        if($user == null){
           $id = '';
        }else{
             $id = $user->id;
        }
        $data = [];

        // $app = new Application();
        if($request->type == 'homebased'){
           
            $data['b_name'] = $request->b_name;
            $data['email'] = $request->email;
            $data['user_id'] = auth()->user()->id;
            $data['b_address'] = $request->b_address;
            $data['message'] = $request->message;
            $data['social_links']= $request->social_links;
            $data['select'] = $request->select;
             $data['type'] = $request->type;
            $data['u_name'] = '';
            $data['has_document'] = '';
        } elseif($request->type == 'nonporfit') {    
            $data['select'] = '';
            $data['u_name'] = $request->u_name; 
            $data['b_name'] = $request->b_name; 
            $data['b_address'] = $request->b_address;
            $data['email'] = $request->email; 
            $data['has_document'] = $request->has_document; 
            $data['user_id'] = auth()->user()->id;
            $data['social_links'] = $request->social_links;
            $data['message'] = $request->message;
            $data['type'] = $request->type;
           
        
        }
        
        $app =  Application::updateOrCreate(
            ['id' => $id],
            $data
        ); 
        if ($app) {

            $details = [
                'email' => $request->email,
                'Buissess Name' => $request->b_name,
                'Application Type' => $request->type,

            ];
            \Mail::to('sawansiddiqui1133@gmail.com')->send(new \App\Mail\MyMailApplication($details));


            return back()->with('success', 'Application Posted Successfully');
        } else {
            return back()->with('success', 'Error in posring Application');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);
        return view('admin.applications.single', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect()->back()->with('success', 'Application Deleted successfully.');
    }
}
