<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('billing', 'BillingController@create')->name('billing.create');
    Route::post('billing', 'BillingController@store')->name('billing.store');

    Route::get('invoices', 'InvoiceController@index')->name('invoices.index');
    Route::get('invoices/{invoice}', 'InvoiceController@show')->name('invoices.show');
});
