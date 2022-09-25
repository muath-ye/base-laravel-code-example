<?php

public function store(CreateInvoice $request)
{
    $invoice = Invoice::create($request->only([
        'order_id',
        'billing_details',
        'tax_id',
    ]));

    return redirect()->route('invoice.show', $invoice);
}
