<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseWatchController;
use App\Http\Controllers\MyVideosController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Category\CategoryManager;
use Illuminate\Support\Facades\Route;

Route::get('/categorys', function () {
    return view('category');
})->name('category');

Route::get('/login', Login::class)->name('logins');
// Route::get('/register', Login::class)->name('register');
Route::get('/register', Register::class)->name('signups');
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/clear-session', function () {
    session()->flush();
    return redirect('/')->with('message', 'You have been logged out.');
})->name('clear-session');



Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/watch', function () {
    return view('watch');
})->name('watch');


//About us about-us
Route::get('/about-us', function () {
    return view('watch');
})->name('about-us');
Route::get('/faqs', function () {
    return view('watch');
})->name('faqs');

//category
// routes/web.php
Route::get('/categories', CategoryManager::class)->name('categories');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/list_category', [CategoryController::class, 'category'])->name('category.list');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// course
Route::get('/course/{slug}/watch', [CourseWatchController::class, 'CourseWatch'])
    ->name('course.watch');
Route::get('/course/{course}', [CourseController::class, 'showOnline'])
    ->name('courses.online')
    ->where('course', '[a-z0-9-]+'); // slug format: my-course-slug


    Route::get('/my-course', [CourseController::class, 'mycourse'])
     ->middleware(['sessionauth'])
    ->name('my.course');
    Route::get('/my-videos', [MyVideosController::class, 'index'])
    ->middleware(['sessionauth', 'admin'])
    ->name('my.videos');
    Route::get('/draftvideo', [MyVideosController::class, 'draft'])
    ->middleware(['sessionauth', 'admin'])   
    ->name('courses.no-video');

    //user profile
    Route::view('profile2', 'profile2')
      ->middleware(['sessionauth', 'users'])
    ->name('profile2');



Route::get('/center/{center}/{course}', [CourseController::class, 'showCenter'])
    ->name('courses.center')
    ->where('course', '[a-z0-9-]+');



    /*
|--------------------------------------------------------------------------
| COURSE ENROLLMENT (PAYSTACK)
|--------------------------------------------------------------------------
*/

Route::get('/enroll/paystack/{slug}', [CourseController::class, 'buy'])->name('enroll.course');

