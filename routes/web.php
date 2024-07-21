<?php

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

//Sample 
Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);
Route::get('/sample/{id}', [App\Http\Controllers\Sample\IndexController::class, 'showId']);
/*Tweet
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');
Route::middleware('auth')->group(function() {
    Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
    ->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index');
    Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put');
    Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');
});*/

//artist
Route::get('/artist', [\App\Http\Controllers\Artist\CalendarController::class, 'index'])->name('calendar');
Route::get('/artist', \App\Http\Controllers\Artist\TopController::class)->name('artist.index');
Route::get('/artist/gallery', \App\Http\Controllers\Artist\IndexController::class)->name('gallery.index');
Route::get('/artist/gallery/search', [\App\Http\Controllers\Artist\IndexController::class, 'search'])->name('gallery.search');
Route::get('/artist/gallery/create', \App\Http\Controllers\Artist\IllustController::class)
->name('artist.create.home');
Route::middleware('auth')->group(function () {
    Route::post('/artist/gallery', \App\Http\Controllers\Artist\CreateController::class)
    ->name('artist.create');
    Route::post('/artist/contact', \App\Http\Controllers\Artist\ContactController::class)
    ->name('artist.contact');
    Route::get('/artist/update/{artistId}', \App\Http\Controllers\Artist\Update\IndexController::class)->name('artist.update.index')
    ->where('artistId', '[0-9]+');
    Route::put('/artist/update/{artistId}', \App\Http\Controllers\Artist\Update\PutController::class)->name('artist.update.put')
    ->where('artistId', '[0-9]+');
    Route::delete('/artist/delete/{artistId}', \App\Http\Controllers\Artist\DeleteController::class)->name('artist.delete');
});
Route::get('/artist/gallery/{artistId}', \App\Http\Controllers\Artist\DetailController::class)->name('artist.detail')
->where('artistId', '[0-9]+');
Route::get('/artist/news', \App\Http\Controllers\Artist\NewsController::class)->name('artist.news');
Route::get('/artist/exhibition', [\App\Http\Controllers\Artist\NewsController::class, 'index'])->name('artist.exhibition');
Route::get('/artist/contact', \App\Http\Controllers\Artist\IndexContactController::class)
->name('artist.contact.index');

Route::get('/dashboard', function () {
    return view('artist.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
