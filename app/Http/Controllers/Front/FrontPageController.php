<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Pricing;
class FrontPageController extends Controller
{
    public function termsandcondition(){
        $termsAndCondition = Page::where('type', 'termsOfUse')->first();
        return view('front.termsAndCondition', compact('termsAndCondition'));
    }
    public function privacypolicy(){
        $privacyPolicy = Page::where('type', 'privacyPolicy')->first();
        return view('front.privacyPolicy', compact('privacyPolicy'));   
    }
    public function packageIndex(){
        $prices = Pricing::get();
        return view('front.pricing', compact('prices'));
    }
    public function acceptableUsePolicypage(){
        $termsAndCondition = Page::where('type', 'acceptableUsePolicy')->first();
        return view('front.acceptableUsePolicy', compact('termsAndCondition'));   
    }
    public function forms(){
        return view('front.forms');   
    }
}
