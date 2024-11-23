<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\TurnamenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('turnamen', [TurnamenController::class, 'index']);
Route::get('turnamen/tambah', [TurnamenController::class, 'create']);
Route::post('turnamen/tambah', [TurnamenController::class, 'store']);
Route::get('turnamen/update/{id}', [TurnamenController::class, 'edit']);
Route::post('turnamen/update/{id}', [TurnamenController::class, 'update']);
Route::post('turnamen/destroy/{id}', [TurnamenController::class, 'destroy']);

Route::resource('tim', TimController::class);

Route::resource('jadwal', MatchController::class);

Route::get('/pertandingan', [MatchController::class, 'indexPertandingan'])->name('pertandingan.index');
Route::get('/pertandingan/{id}', [MatchController::class, 'winner'])->name('pertandingan.winner');
Route::post('/pertandingan/{id}/update-winner', [MatchController::class, 'updateWinner'])->name('pertandingan.updateWinner');

Route::get('/statistik', [MatchController::class, 'statistik'])->name('statistik.index');




