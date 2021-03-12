<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {

    $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(10);
    return Inertia::render('Dashboard', [
        'posts' =>
        $posts->transform(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
            ];
        }),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');




//Post

Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
