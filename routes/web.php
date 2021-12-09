<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ReportController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Front\FAQController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//                     --------------- ONLY ADMIN Routes -------------  
           
Route::group([ 'middleware' => ['role:Admin']], function () {
    // Route::group(['prefix' => 'admin/', 'middleware' => ['is_admin']], function () {
    Route::resource('role', RoleController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);  
    Route::get('statusChange{id}', [BannerController::class, 'statusChange'])->name('statusChange');
    Route::resource('banner', BannerController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('pricing', PricingController::class);
    Route::get('terms-of-use', [PageController::class, 'termsOfUse'])->name('terms.of.use');
    Route::get('privacy-Policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
    Route::get('acceptableUsePolicy', [PageController::class, 'acceptableUsePolicy'])->name('acceptable.Use.Policy');
    Route::post('save-page-data', [PageController::class, 'store'])->name('save-page-data');
    Route::get('showPayments',[PaymentController::class, 'showPayments'])->name('showPayments');

});

//                     --------------- ADMIN AND USER Routes -------------  

Route::group(['middleware' => ['role:Admin|user']], function(){
    Route::get('poststatusChange{id}', [PostController::class, 'poststatusChange'])->name('poststatusChange');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('verified');
    Route::get('profile', [AdminController::class, 'viewProfile'])->name('admin.profile');
    Route::patch('profile/update{id}', [AdminController::class, 'update'])->name('profile.update');
    Route::post('dropzone/upload/{id}',[PostController::class, 'upload'])->name('dropzone.upload');
    Route::get('dropzone/fetch',[PostController::class, 'fetch'])->name('dropzone.fetch');
    Route::get('draftPosts',[PostController::class, 'draftPosts'])->name('draft.posts');
    Route::get('dropzone/delete/', [PostController::class, 'delete'])->name('dropzone.delete');
    Route::resource('post', PostController::class); 
    Route::get('postReports/{id}', [ReportController::class, 'postReports'])->name('post.reports');
    Route::get('/package',[FrontPageController::class, 'packageIndex'])->name('front.package');
    Route::get('/listings', [HomeController::class, 'listings'])->name('listings');
    Route::resource('application', ApplicationController::class);

});
// Route::group(['middleware' => ['role:user']], function(){
// });


//                     --------------- FRONT Routes -------------  
Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::Post('search/listings', [HomeController::class, 'searchListingPost'])->name('search.listing.post');
Route::get('/listing/{id}', [HomeController::class, 'getSinglePost'])->name('single.post');
Route::get('/post/with/category/{id}', [HomeController::class, 'postWithCategory'])->name('post.with.category');
Route::Post('/', [HomeController::class, 'searchListing'])->name('search.listing');
Route::Post('/submit/report', [ReportController::class, 'submitReport'])->name('submit.report');
Route::get('showReports/{id}', [ReportController::class, 'showReports'])->name('report.show');
Route::post('deleteReports/{id}', [ReportController::class, 'deleteReports'])->name('report.delete');
Route::get('/faqs', [ReportController::class, 'showFaqs'])->name('show.faqs');
Route::post('sort/listing', [HomeController::class, 'sortListing'])->name('sort.listing');
Route::get('/terms-and-condition',[FrontPageController::class, 'termsandcondition'])->name('front.termscondition');
Route::get('/privacy-policy',[FrontPageController::class, 'privacypolicy'])->name('front.privacypolicy');
Route::get('/package',[FrontPageController::class, 'packageIndex'])->name('front.package');

Route::post('stripe', [PaymentController::class, 'stripePost'])->name('stripe.post');
Route::post('charge',[PaymentController::class, 'charge'])->name('payment');
Route::get('paymenterror',[PaymentController::class, 'payment_error'])->name('payment.cancel');
Route::get('paymentsuccess',[PaymentController::class, 'payment_success'])->name('payment.success');
Route::get('checkout/{id}',[PaymentController::class, 'checkout'])->name('checkout.page');
Route::get('/package',[FrontPageController::class, 'packageIndex'])->name('front.package');
Route::get('/acceptable-UsePolicy',[FrontPageController::class, 'acceptableUsePolicypage'])->name('acceptable.use.policy');
Route::get('/forms',[FrontPageController::class, 'forms'])->name('forms.view');
Route::post('add-remove', [PostController::class, 'storePremiumListingImages'])->name('add-remove-image');


require __DIR__.'/auth.php';


