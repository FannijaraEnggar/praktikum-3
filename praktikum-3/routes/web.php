<?php

use App\Http\Controllers\RouteController;
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

//laravel routing
Route::get('/routing', function() {
    return view('routing');
});

//basic routing
Route::get('/basic_routing', function() {
    return 'Hello World';
});

//route parameter required
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

//route parameter optional
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

//route with regular expressione constraints
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

//route priority
// Route::get('/route_priority/{rpId}', function($rpId) {
//     return "This is Route One";
// });
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

//fallback routes
Route::fallback(function() {
    return 'This is Fallback Route';
});

//route groups
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});

//view bootstrap 
Route::view('/view_bootstrap', 'view_bootstrap');
Route::view('/view_bootstrap', 'view_bootstrap', ['name' => 'Fannijara']);

//view route
Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Fannijara']);

//controller route
Route::get('/controller_route', [RouteController::class, 'index']);

//redirect route
Route::redirect('/', '/routing');

//named route
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

