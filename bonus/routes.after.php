<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('billing', 'BillingController')->only('create', 'store');

    Route::resource('invoices', 'InvoiceController')->only('index', 'show');
});
