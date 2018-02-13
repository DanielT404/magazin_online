<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client')->except('userLogout');
    }

    public function showLoginForm()
    {

        return view('auth.login', ['categories' => Category::all()]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:2'
        ]);

        if(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('profile');
        }

        return redirect()->back()->withInput($request->only('email', 'password'));
    }

    public function userLogout()
    {
        Auth::guard('client')->logout();
        return redirect(route('home'));

    }
}
