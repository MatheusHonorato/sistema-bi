<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Phone;

Route::get('clients', Clients::class)->name('clients')->middleware('auth');

Route::get('phones/{id}', Phone::class)->name('phones.show')->middleware('auth');

Route::get('dashboard', Dashboard::class)->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return redirect('/login');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
