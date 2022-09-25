<?php

public function store(CreatePayment $request)
{
    $product = Product::findOrFail($request->input('product_id'));

    $user = User::where('email', $request->input('email'))->first();
    if (is_null($user)) {
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt(generate_default_password()),
        ]);
    }

    $order = Order::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'total' => $product->price,
        'status' => Order::STATUS_PENDING,
    ]);

    // ...
}
