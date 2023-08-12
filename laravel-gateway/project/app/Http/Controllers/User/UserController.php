<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Classes\GoogleAuthenticator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminUserConversation;
use App\Models\Billing;
use App\Models\Country;
use App\Models\Deposit;
use App\Models\Generalsetting;
use App\Models\Invest;
use App\Models\Order;
use App\Models\ReferralBonus;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use App\Traits\Payout;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user'] = Auth::user();
        $data['transactions'] = Transaction::whereUserId(auth()->id())->orderBy('id','desc')->limit(5)->get();

        return view('user.dashboard',$data);
    }

    public function billingDetails(Request $request, $id)
    {
        $data = Billing::whereTransactionId($id)->first();
        return view('user.billingdetails',compact('data'));
    }

}
