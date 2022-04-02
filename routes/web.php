<?php

use App\Http\Controllers\ContactMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Phone;

Route::get('clients', Clients::class)->name('clients');

Route::get('phones/{id}', Phone::class)->name('phones.show');

Route::get('painel', Dashboard::class)->name('dashboard');

Route::view('/', 'quem-somos')->name('welcome');
Route::view('/quem-somos', 'quem-somos')->name('quem-somos');
Route::view('/pagamento-online', 'comprar')->name('comprar');
Route::view('/contato', 'contato')->name('contato');
Route::view('/nossos-servicos', 'nossos-servicos')->name('nossos-servicos');


Route::post('send-contact-mail', [ContactMailController::class, 'index'])->name('contact.mail');

Route::redirect('/register', '/painel', 301);


/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
