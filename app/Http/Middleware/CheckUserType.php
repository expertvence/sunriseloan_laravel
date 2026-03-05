<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = Auth::user();

    // if ($user->user_type == 'admin') {
    //     return redirect()->route('home');
    // }

    // if ($user->user_type == 'user') {
    //     return redirect()->route('member_profile', ['id' => $user->member_id]);
    // }
     // Check if the user is authenticated
     if (!Auth::check()) {
        return redirect('/login'); // Redirect to login if not authenticated
    }

    // Check if the user type matches the required type for this route
    if (Auth::user()->user_type !== $type) {
        if (Auth::user()->user_type=="user") {
            return redirect()->route('userDashboard');
        }
        elseif
        (Auth::user()->user_type=="employee") {
            // return redirect()->route('member_profile', ['id' => Auth::user()->member_id]);
            return redirect()->route('userDashboard');
        }elseif(Auth::user()->user_type=="manager"){
            
            return redirect()->route('managerDashboard');
        }
        else{
            return redirect('/home'); // Redirect if user type does not match
        }
       
    }
        return $next($request);
    }
}
