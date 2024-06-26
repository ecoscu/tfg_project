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
    abort_unless(Auth::check(), 401);
    abort_unless(Auth::user()->admin == '1', 401);

    return view('createcontent');
})->name('createcontent');

Route::post('/CreateContent', [\App\Http\Controllers\ContentController::class, 'store'])->name('content.store');

Route::get('/toggle-favorite/{content_id}', [\App\Http\Controllers\FavouritesController::class, 'addFavorite'])->name('toggle.favorite');

Route::get('/toggle-watched/{content_id}', [\App\Http\Controllers\WatchedController::class, 'addWatched'])->name('toggle.watched');

Route::get('/toggle-pending/{content_id}', [\App\Http\Controllers\PendingsController::class, 'addPending'])->name('toggle.pending');

Route::get('/profile-page', [\App\Http\Controllers\ProfilePageController::class, 'profilepage'])->name('profile.page');

Route::get('/home-movies', [\App\Http\Controllers\ContentController::class, 'movies'])->name('content.movies');

Route::get('/home-series', [\App\Http\Controllers\ContentController::class, 'series'])->name('content.series');

Route::get('/buscar', [\App\Http\Controllers\ContentController::class, 'buscar'])->name('buscar');

Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::post('/filter/{filter}', [\App\Http\Controllers\ContentController::class, 'filter'])->name('filter');

Route::post('/rate/{content_id}/{rate}', [\App\Http\Controllers\ContentController::class, 'rate'])->name('rate');

Route::get('/foro/{filter?}', [\App\Http\Controllers\ForoController::class, 'showforo'])->name('foro');

Route::post('/forocomment', [\App\Http\Controllers\ForoController::class, 'saveforocomment'])->name('forocomment');

Route::get('/forocomment-delete/{comment_id}', [\App\Http\Controllers\ForoController::class, 'deletecomment'])->name('forocommentdelete');

Route::get('/like-comment/{comment_id}/{content_id}', [\App\Http\Controllers\CommentController::class, 'likecomment'])->name('like-comment');

Route::get('/CreateList',function(){
    abort_unless(Auth::check(), 401);
    return view('createlist');
})->name('createlist');

Route::post('/list', [\App\Http\Controllers\ListsController::class, 'store'])->name('lists.store');

Route::get('/lists/{lista_id}', [\App\Http\Controllers\ListsController::class, 'show'])->name('list.show');

Route::get('/lists-add/{lista_id}/{content_id}', [\App\Http\Controllers\ListsController::class, 'addcontent'])->name('list.addcontent');

Route::get('/lists-remove/{lista_id}/{content_id}', [\App\Http\Controllers\ListsController::class, 'removecontent'])->name('list.removecontent');

Route::get('/lists-delete/{lista_id}', [\App\Http\Controllers\ListsController::class, 'deletelist'])->name('list.delete');

Route::get('/comment-delete/{comment_id}', [\App\Http\Controllers\CommentController::class, 'deletecomment'])->name('comment.delete');

Route::get('/adminpanel', [\App\Http\Controllers\AdminPanelController::class, 'show'])->name('adminpanel');

Route::get('/delete-content/{content_id}', [\App\Http\Controllers\ContentController::class, 'delete'])->name('deletecontent');

Route::get('/forolike/{comment_id}/{filter?}', [\App\Http\Controllers\ForoController::class, 'likecomment'])->name('likeforocomment');

// Route::post('/forocommentfilter/{filter}', [\App\Http\Controllers\ForoController::class, 'forocommentfilter'])->name('forocommentfilter');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
