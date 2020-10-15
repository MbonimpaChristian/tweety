<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Follower;


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

Route::get('/test', function () {
    $user1 = User::find(1);
    $user2 = User::find(2);
    $user1->following()->attach($user2);
    dd($user2->following()->find($user1));
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia\Inertia::render('Dashboard');
// })->name('dashboard');
Route::get('/dashboard', [HomeController::class,'index']);
Route::post('/like',[HomeController::class,'like']);
Route::delete('/dislike',[HomeController::class,'dislike']);
Route::resource('posts', PostController::class);
Route::get('/profile',[HomeController::class,'profile']);
Route::get('/editProfile',[HomeController::class,'editProfile']);
Route::post('/updateProfile',[HomeController::class,'updateProfile']);
Route::get('/comment',[HomeController::class,'getComment']);
Route::post('/comment',[HomeController::class,'postComment']);
Route::get('/following',[HomeController::class,'follow'])->name('follow');
Route::get('/unfollowing',[HomeController::class,'unfollow'])->name('unfollow');
Route::get('/',function(){
    return view('welcome');
});


