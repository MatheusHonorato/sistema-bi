<?php

use App\Http\Controllers\ContactMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Phone;

Route::view('/', 'welcome')->name('welcome');

Route::get('clients', Clients::class)->name('clients');

Route::get('phones/{id}', Phone::class)->name('phones.show');

Route::view('/tabulacao-de-dados-informacao', 'tabulacao-de-dados')->name('tabulacao-de-dados');

Route::view('/levantamento-de-dados', 'levantamento-de-dados')->name('levantamento-de-dados');
Route::view('/infraestutura-de-dados', 'infraestutura-de-dados')->name('infraestutura-de-dados');
Route::view('/demonstracao-de-sincronizacao', 'demonstracao-de-sincronizacao')->name('demonstracao-de-sincronizacao');
Route::view('/gerar-etiquetas', 'gerar-etiquetas')->name('gerar-etiquetas');


Route::get('tabulacao-de-dados', Dashboard::class)->name('dashboard');

Route::view('/assessoria-empresarial', 'assessoria-empresarial')->name('assessoria-empresarial');
Route::view('/quem-somos', 'quem-somos')->name('quem-somos');
Route::view('/pagamento-online', 'comprar')->name('comprar');
Route::view('/contato', 'contato')->name('contato');
Route::view('/nossos-servicos', 'nossos-servicos')->name('nossos-servicos');
Route::view('/politicas-privacidade', 'politicas-privacidade')->name('politicas-privacidade');

Route::post('send-contact-mail', [ContactMailController::class, 'index'])->name('contact.mail');

Route::redirect('/register', '/tabulacao-de-dados', 301);

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
