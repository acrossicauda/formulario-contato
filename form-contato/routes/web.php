<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Teste para visualizar formato do email
//Route::get('mailcontato', function () { return view('mail.contato'); });


Route::get('/success', function () {
    return view('mail.success');
})->name('mail.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('contato', [ContatoController::class, 'store'])->name('contato.create');
Route::get('contato', [ContatoController::class, 'index'])->middleware(['auth', 'verified'])->name('contato.index');

Route::get('/testmail', function () {

    $name = "Tiago Sousa";
    // O envio de emails é feito usando o método "to" na facade Mail
    Mail::to('acrossicaudadev@gmail.com')->send(new \App\Mail\SendMail($name));

    return view('mail.success');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
