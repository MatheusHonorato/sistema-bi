<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\States;
use App\Http\Livewire\Cities;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Phones;

Route::get('states', States::class)->middleware('auth');
Route::get('cities', Cities::class)->middleware('auth');
Route::get('clients', Clients::class)->middleware('auth');
Route::get('phones', Phones::class)->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
