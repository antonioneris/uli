<?php

Route::get('/','PagamentosController@index');
Route::get('/pagamento', 'PagamentosController@index');
Route::get('/pagamento/planos', 'PagamentosController@plano')->name('plano');

Route::get('/pagamento/dadosCliente', 'PagamentosController@cliente')->name('cliente');
Route::post('/pagamento/dadosCliente', 'PagamentosController@cliente');

Route::post('/pagamento/dadosCliente/dadosCartao', 'PagamentosController@salvarCliente')->name('salvarCliente');
Route::get('/pagamento/dadosCliente/dadosCartao', 'PagamentosController@salvarCliente');

Route::post('/pagamento/dadosCliente/dadosCartao/salvar', 'PagamentosController@salvarCartao')->name('salvarCartao');
Route::get('/pagamento/dadosCliente/dadosCartao/salvar', 'PagamentosController@index');