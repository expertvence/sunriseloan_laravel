<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\MemberRegistration;
use Illuminate\Http\Request;
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

    protected function credentials(Request $request)
    {
        // Check if the input is an email or a mobile number
        $login = $request->input('email');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
      
        if ($field === 'mobile') {
            // Find the member by mobile number and get the associated user's email
            $member = MemberRegistration::where('mobile', $login)->select('members.*','users.email as user_mail')->join('users','users.member_id','=','members.id')->first();
           
            if ($member && $member->user_mail !='') {
                return [
                    'email' => $member->user_mail,  // Login with the associated user's email
                    'password' => $request->input('password'),
                ];
            }
        }

        // If the input is an email or the mobile lookup fails, default to email login
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }

}
