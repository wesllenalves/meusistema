<?php

Route::group(['middleware' => 'web', 'prefix' => 'pagseguro', 'namespace' => 'Pagseguro\Pagseguro\Http\Controllers'], function()
{
    Route::get('/', 'PagseguroController@index');
});
