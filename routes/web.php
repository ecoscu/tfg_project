<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('inicio');
// });


Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/Home', [\App\Http\Controllers\ContentController::class, 'show'])->name('dashboard');

Route::get('/content/{slug}', [\App\Http\Controllers\ContentController::class, 'slug'])->name('slug');

Route::get('/CreateContent',function(){
    return view('createcontent');
})->name('createcontent');

Route::post('/CreateContent', [\App\Http\Controllers\ContentController::class, 'store'])->name('content.store');

Route::get('/toggle-favorite/{content_id}', [\App\Http\Controllers\FavouritesController::class, 'addFavorite'])->name('toggle.favorite');

Route::get('/toggle-watched/{content_id}', [\App\Http\Controllers\WatchedController::class, 'addWatched'])->name('toggle.watched');


Route::get('/profile-page', [\App\Http\Controllers\ProfilePageController::class, 'profilepage'])->name('profile.page');

Route::get('/home-movies', [\App\Http\Controllers\ContentController::class, 'movies'])->name('content.movies');

Route::get('/home-series', [\App\Http\Controllers\ContentController::class, 'series'])->name('content.series');

Route::get('/buscar', [\App\Http\Controllers\ContentController::class, 'buscar'])->name('buscar');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
