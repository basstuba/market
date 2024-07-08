<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BuyRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Item;
use App\Models\SoldItem;

class BuyController extends Controller
{
    public function buy($itemId) {
        $item = Item::find($itemId);

        return view('buy', compact('item'));
    }

    public function paymentRedirect(Request $request) {
        return redirect()->route('buy', ['item' => $request->item_id])->withInput();
    }

    public function payment(BuyRequest $request) {
        $item = Item::find($request->item_id);
        $payMethod = $request->input('pay');

        Stripe::setApiKey(config('services.stripe.st_key'));

        $customer = Customer::create();
        if($payMethod === 'customer_balance') {
            $paymentIntent = PaymentIntent::create([
                'customer' => $customer->id,
                'amount' => $item->price,
                'currency' => 'jpy',
                'payment_method_types' => [$payMethod],
                'payment_method_data' => [
                    'type' => $payMethod,
                ],
                'payment_method_options' => $payMethod === 'customer_balance' ? [
                    'customer_balance' => [
                        'funding_type' => 'bank_transfer',
                        'bank_transfer' => [
                            'type' => 'jp_bank_transfer',
                        ],
                    ],
                ] : [],
            ]);
        }else{
            $paymentIntent = PaymentIntent::create([
                'amount' => $item->price,
                'currency' => 'jpy',
                'payment_method_types' => [$payMethod],
            ]);
        }

        return view('stripe', [
            'item' => $item,
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }

    public function stripeSuccess(Request $request) {
        $user = Auth::user();
        $sold = $request->only('item_id');
        $sold['user_id'] = $user->id;

        SoldItem::create($sold);

        return redirect()->route('detail', ['item' => $request->item_id])
        ->with('message', 'お買い上げありがとうございます');
    }
}
