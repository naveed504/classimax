<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Post;
use App\Models\FAQ;
use Illuminate\Support\Facades\Validator;
use Response;
use Mail;
use Auth;

class ReportController extends Controller
{
    public function submitReport(Request $request){
       
      $validator = Validator::make($request->all(), [
          'description' => 'required'
      ]);
      $usermail = $request->post_user_email;
      $report = new Report();
      $report->category_id = $request->category_id;
      $report->description = $request->description;
      $report->user_id = Auth::user()->id;
      $report->post_id = $request->post_id;
      if($validator->passes()){
           $report->save();
           $details = [
               'description' => $request->description,

           ];
           \Mail::to($usermail)->send(new \App\Mail\MyMail($details));
           return Response::json(['success' => 1]);
      }
      return Response::json(['query' => 0]);
    }

    public function postReports($id){
        $reports = Report::where('post_id',$id)->with('user')->get();
        return view('admin.posts.reports', compact('reports'));
    }

    public function deleteReports($id){
    
        $report = Report::find($id);
        $report->delete();
        return redirect()->back()->with('success', 'Report Deleted successfully.');
    }
    public function showFaqs(){
        $faqs = FAQ::get();
        return view('front.faq', compact('faqs'));
    }


}
