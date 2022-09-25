<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request)
    {
        try {
            $product = Product::findOrFail($request->get('product_id'));

            \Stripe\Stripe::setApiKey(config('settings.stripe.secret'));

            $order = new Order([
                'product_id' => $product->id,
                'total' => $product->price,
            ]);

            $charge = \Stripe\Charge::create([
                'amount' => $order->totalInCents(),
                'currency' => 'usd',
                'source' => $request->get('stripeToken'),
                'description' => 'BaseCode - ' . $order->product->name,
                'receipt_email' => $request->get('stripeEmail'),
            ]);

            $user = User::createFromPurchase($request->get('stripeEmail'), $charge->id);

            $order->user_id = $user->id;
            $order->stripe_id = $charge->id;
            $order->save();

            Auth::login($user, true);
            Mail::to($user->email)->send(new OrderConfirmation($order));
        } catch (\Stripe\Exception\CardException $e) {
            $data = $e->getJsonBody();
            Log::error('Card failed: ', $data);
            $template = 'partials.errors.charge_failed';
            $data = $data['error'];

            return back()->withInput($request->input())->with('error', compact('template', 'data'));
        } catch (\PDOException $e) {
            Log::error($e);

            return back()->withInput($request->input())->with('error', ['template' => 'partials.errors.order_save_failed']);
        } catch (\Exception $e) {
            Log::error($e);
            $template = 'partials.errors.order_unknown_failure';
            $data = ['code' => $e->getCode()];

            return back()->withInput($request->input())->with('error', compact('template', 'data'));
        }

        return redirect('/users/edit');
    }
