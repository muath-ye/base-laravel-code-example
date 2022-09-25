<?php

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);


Route::group(['middleware' => ['auth']], function () {
  Route::get('billing', [
      'as' => 'billing.create',
      'uses' => 'BillingController@create',
  ]);
  Route::post('billing', [
      'as' => 'billing.store',
      'uses' => 'BillingController@store',
  ]);

  Route::get('invoices', [
      'as' => 'invoices.index',
      'uses' => 'InvoiceController@index',
  ]);
  Route::get('invoices/{invoice}', [
      'as' => 'invoices.show',
      'uses' => 'InvoiceController@show',
  ]);
});
