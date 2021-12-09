<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;
use Stripe;
use DB;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Pricing;
use Illuminate\Contracts\Session\Session as SessionSession;

class PaymentController extends Controller
{
    public $gateway;
    public $package_id;
    public function __construct(Request $request)
    {
        $this->package_id = $request->package_id;
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID', 'AR5La-O1NDgb4imR8jMC_YuPDJmAgL4CbXZFcUpMLdFn0Ay6CwXmU9WNVkeNntqg4UqXAfrQ8UMhoan3'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET', 'ECYnY5AcS9PEG6GgNNi8sKh0H_IbJOtS4pXETWIOLzRKjYDfZahM0DF7DgmjCdlS6yuARi6nySsRpo74'));
        $this->gateway->setTestMode(true);
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    public function checkout($id)
    {
        $pricing = Pricing::find($id);
        return view('front.payment', compact('pricing'));
    }
    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $response =  Stripe\Charge::create([
            "amount" => (float)$request->total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" =>  $request->name . "package"
        ]);

        if ($response->status == 'succeeded') {
            $payment = Payment::where('user_id', $this->user->id)->select('id')->first();

            if ($payment == null) {
                $id = '';
            } else {
                $id = $payment->id;
            }

            $data = [];
            $data['user_id'] = $this->user->id;
            $data['package_id'] = $this->package_id;
            $data['stripe_id'] = $response->id;
            $data['stripe_payment_method'] = $response->payment_method;
            $data['payment_id'] = '';
            $data['payer_id'] = '';
            $data['payer_email'] = '';
            $data['currency'] = config('services.stripe.currency');
            $data['payment_status'] = $response->status;
            $payment =  Payment::updateOrCreate(
                ['id' => $id],
                $data
            );
            if ($payment) {
                Session::flash('success', 'Payment successful!');
                return back();
            } else {
                Session::flash('success', 'Something went Worng!');
                return back();
            }
        }

        Session::flash('success', 'Something went Worng!');

        return back();
    }

    public function charge(Request $request)
    {
      
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->input('amount'),
                'package_id' => $this->package_id,
                'currency' => env('PAYPAL_CURRENCY', 'USD'),
                'returnUrl' => url('paymentsuccess'),
                'cancelUrl' => url('paymenterror'),
            ))->send();


            if ($response->isRedirect()) {
                Session::put('package_id', $this->package_id);
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Exception $e) {

            return $e->getMessage();
        }
    }
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment_success(Request $request)
    {
        $package_id = Session::get('package_id');
        if ($request->input('paymentId') && $request->input('PayerID')) {

            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr_body = $response->getData();

                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();

                if (!$isPaymentExist) {
                    $payment = Payment::where('user_id', $this->user->id)->select('id')->first();

                    if ($payment == null) {
                        $id = '';
                    } else {
                        $id = $payment->id;
                    }
                    $data = [];
                    $data['user_id'] = $this->user->id;
                    $data['package_id'] = $package_id;
                    $data['stripe_id'] = '';
                    $data['stripe_payment_method'] = '';
                    $data['payment_id'] = $arr_body['id'];
                    $data['payer_id'] = $arr_body['payer']['payer_info']['payer_id'];
                    $data['payer_email'] = $arr_body['payer']['payer_info']['email'];
                    $data['currency'] = config('services.stripe.currency');
                    $data['payment_status'] = $arr_body['state'];
                    $payment =  Payment::updateOrCreate(
                        ['id' => $id],
                        $data
                    );
                }
               
                Session::flash('success', 'Payment successful!');
                return back();
            } else {
                return $response->getMessage();
            }
        } else {
            Session::flash('success', 'Transaction is declined');
            return back();
        }
    }
    public function payment_error()
    {
        Session::flash('success', 'User is canceled the payment.');
        return back();
        // return 'User is canceled the payment.';
    }

    public function showPayments(){
        $data = Payment::with('user' ,'package')->get();
        return view('admin.users.showPayments', compact('data'));

    }
}
