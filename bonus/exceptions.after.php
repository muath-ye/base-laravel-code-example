<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\CreateOrderRequest;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\Services\PaymentGateway;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request, PaymentGateway $paymentGateway)
    {
        $product = Product::findOrFail($request->get('product_id'));
        $order = new Order([
            'product_id' => $product->id,
            'total' => $product->price,
        ]);

        $charge_id = $paymentGateway->charge(
                          $request->get('stripeToken'),
                          $request->get('stripeEmail'),
                          $order->total,
                          $order->product->name);

        $user = User::createFromPurchase($request->get('stripeEmail'), $charge_id);

        $order->user_id = $user->id;
        $order->transaction_id = $charge_id;
        $order->save();

        Auth::login($user, true);
        Mail::to($user->email)->send(new OrderConfirmation($order));

        return redirect('/users/edit');
    }
}
