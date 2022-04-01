<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Phone;

Route::get('clients', Clients::class)->name('clients');

Route::get('phones/{id}', Phone::class)->name('phones.show');

Route::get('dashboard', Dashboard::class)->name('dashboard');

Route::view('/quem-somos', 'quem-somos')->name('quem-somos');
Route::view('/comprar', 'comprar')->name('comprar');
Route::view('/contato', 'contato')->name('contato');
Route::view('/nossos-servicos', 'nossos-servicos')->name('nossos-servicos');


Route::redirect('/register', '/dashboard', 301);


Route::get('/', function () {
    return redirect('/login');
});
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/