<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
    public function paymentProcess(Request $request)
    {
        try {
            $data = json_encode(request()->all());
            $order = json_decode(json_decode(json_encode($data), true),true);

            $transaction = new Transaction();
            $transaction->user_id = 1;
            $transaction->email = "user@gmail.com";
            $transaction->currency = $order['order']['currency'];
            $transaction->amount = $order['order']['total'];
            $transaction->type =  $order['order']['payment_method_title'];
            $transaction->profit = 'minus';
            $transaction->txnid = $order['order']['order_key'];
            $transaction->save();

            $billing = new Billing();
            $billing->transaction_id = $transaction->id;
            $billing->first_name = $order['order']['billing']['first_name'];
            $billing->last_name = $order['order']['billing']['last_name'];
            $billing->email = $order['order']['billing']['email'];
            $billing->phone = $order['order']['billing']['phone'];
            $billing->company = $order['order']['billing']['company'];
            $billing->address_1 = $order['order']['billing']['address_1'];
            $billing->address_2 = $order['order']['billing']['address_2'];
            $billing->city = $order['order']['billing']['city'];
            $billing->state = $order['order']['billing']['state'];
            $billing->postcode = $order['order']['billing']['postcode'];
            $billing->country = $order['order']['billing']['country'];
            $billing->save();

            $user = User::findOrFail(1);
            if($user)
            {
                $user->decrement('balance',$order['order']['total']);
                $user->save();
            }

            return response()->json(['status' => 'success',  'error' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error',  'error' => $e->getMessage()]);
        }

    }
}
