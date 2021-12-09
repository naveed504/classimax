<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'email' => ['required_with:confimr_email|same:confimr_email', 'string', 'email', 'max:255', 'unique:users'],
            'confimr_email' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[@$!%*#?&]).*$/',
            'confirm_password' => 'min:6|required'
        ]);
    //    dd($reqeust->validate());
        $user = User::create([
            'name' => $request->name,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
         $user->assignRole('user');
        // Auth::login($user);
        return view('auth.verify-email');
        // return redirect(RouteServiceProvider::HOME);
    }
}
