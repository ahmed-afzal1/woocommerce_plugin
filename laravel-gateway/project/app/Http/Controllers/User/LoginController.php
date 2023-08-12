<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function showLoginForm()
    {
      return view('user.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'   => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if(Auth::guard('web')->user()->is_banned == 1)
            {
              Auth::guard('web')->logout();
              return response()->json(array('errors' => [ 0 => 'You are Banned From this system!' ]));
            }

            if(Auth::guard('web')->user()->email_verified == 'No')
            {
              Auth::guard('web')->logout();
              return response()->json(array('errors' => [ 0 => 'Your Email is not Verified!' ]));
            }

            $user = auth()->user();
            $user->update(['verified'=>1]);
            return response()->json(route('user.dashboard'));
        }

        return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ]));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->forget('setredirectroute');
        session()->forget('affilate');
        return redirect('/');
    }


}
