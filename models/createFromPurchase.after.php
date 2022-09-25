<?php

class Order extends Model
{
    // ...

    public static function createFromPurchase(CreatePurchase $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $user = User::findOrDefault($request->input('email'));
        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'total' => $product->price,
            'status' => Order::STATUS_PENDING,
        ]);

        return $order;
    }

}
