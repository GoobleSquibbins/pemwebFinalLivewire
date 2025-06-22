<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Main;
use App\Livewire\TiketIndex;
use App\Livewire\FilmIndex;
use App\Livewire\CreateFilm;
use App\Livewire\EditFilm;
use App\Livewire\DeleteFilm;
use App\Livewire\CreateJadwal;
use App\Livewire\EditJadwal;
use App\Livewire\DeleteJadwal;
use App\Livewire\BookTiket;
use App\Http\Controllers\CinemaController;


Route::get('/', [CinemaController::class, 'showLogin'])->name('showLogin');

Route::post('/login', [CinemaController::class, 'login'])->name('login');

Route::get('/register', [CinemaController::class, 'register'])->name('register');
Route::post('/store_user', [CinemaController::class, 'store_user'])->name('store.user');

Route::get('/main', Main::class)->name('main');

Route::get('/tiket', TiketIndex::class)->name('tiket');
Route::get('/tiketBook/{id}', BookTiket::class)->name('tiket.book');

Route::get('/film', FilmIndex::class)->name('film');
Route::get('/film_create', CreateFilm::class)->name('film.create');

Route::get('/film/edit/{id}', EditFilm::class)->name('film.edit');
Route::get('/film/delete/{id}', DeleteFilm::class)->name('film.delete');

// Route::get('/jadwal', JadwalIndex::class)->name('jadwal');
Route::get('/jadwal_create', CreateJadwal::class)->name('jadwal.create');
Route::get('/jadwal/edit/{id}', EditJadwal::class)->name('jadwal.edit');
Route::get('/jadwal/delete/{id}', DeleteJadwal::class)->name('jadwal.delete');

Route::get('/logout', [CinemaController::class, 'logout'])->name('logout');