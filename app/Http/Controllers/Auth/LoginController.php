<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $get_email_otp = Setting::where('key', 'email_otp')->first();

        $email_otp = $get_email_otp->val;

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && \Hash::check($request->password, $user->password)) {
            if ($email_otp != 1) {

                Auth::login($user);

                return redirect()->route('index');
            } else {

                $verificationCode = rand(100000, 999999);

                $user->verification_code = $verificationCode;
                $user->verification_code_expires_at = Carbon::now()->addMinutes(10);
                $user->save();

                Mail::raw("Your verification code is: $verificationCode", function ($message) use ($user) {
                    $message->to($user->email)->subject('Verification Code');
                });

                session(['unverified_user_id' => $user->id]);

                return redirect()->route('verify.show');
            }
        } else {
            return back()->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }

    }

    public function showVerificationForm()
    {
        return view('auth.twofactor-verify');
    }

    // Verify the code
    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric',
        ]);

        $user = User::find(session('unverified_user_id'));

        if ($user && $user->verification_code == $request->verification_code && Carbon::now()->lessThanOrEqualTo($user->verification_code_expires_at)) {

            $user->verification_code = null;
            $user->verification_code_expires_at = null;
            $user->save();

            Auth::login($user);

            session()->forget('unverified_user_id');

            return redirect()->route('index');
        } else {
            return back()->withErrors([
                'verification_code' => 'Invalid verification code or code expired',
            ]);
        }

    }


}
