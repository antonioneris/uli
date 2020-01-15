<?php

Route::get('/','PagamentosController@index');
Route::get('/pagamento', 'PagamentosController@index');
Route::get('/pagamento/planos', 'PagamentosController@plano')->name('plano');

Route::get('/pagamento/dadosCliente', 'PagamentosController@cliente')->name('cliente');
Route::post('/pagamento/dadosCliente', 'PagamentosController@cliente');
Route::post('/pagamento/dadosCliente/gravar', 'PagamentosController@salvarCliente')->name('salvarCliente');

Route::get('/pagamento/dadosCartao', 'PagamentosController@dadosCartao');