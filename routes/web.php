<?php

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','CandidatoController@verificarPeriodoInscricoes')->name('verificarPeriodoInscricoes');
Route::post('/inscricao', 'CandidatoController@realizarInscricao')->name('realizarInscricao');

Route::get('/gerenciador', 'CandidatoController@menu')->name('candidatos.menu')->middleware('auth');
Route::get('/gerenciador/candidatos','CandidatoController@index')->name('candidatos.index')->middleware('auth');

Route::get('/gerenciador/candidatos/visualizar/{id}','CandidatoController@visualizar')->name('candidatos.visualizar')->middleware('auth');
Route::get('/gerenciador/candidatos/baixartodos/{id}','CandidatoController@baixarTodosDocumentos')->name('baixar.todos')->middleware('auth');
Route::get('/gerenciador/candidatos/visualizar/baixar/{id}','CandidatoController@baixarDocumento')->name('baixar.documento')->middleware('auth');


Route::get('/auditoria','AuditController@index')->name('candidatos.audit')->middleware('auth');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth');;


Auth::routes();





