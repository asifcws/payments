<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'payments',
    'namespace'  => '\Cws\Payments\Http\Controllers'],
    function () {
        Route::get('callback', 'PaymentsController@callback')->name('payments.callback');
    }
);