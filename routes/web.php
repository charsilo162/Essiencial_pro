<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseWatchController;
use App\Http\Controllers\DetailsCenterController;
use App\Http\Controllers\MyVideosController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Category\CategoryManager;
use App\Livewire\Category\CategorynewManager;
use App\Livewire\Course\NoVideoCourses;
use App\Livewire\CourseWatch;
use App\Livewire\VenueList;
use App\Livewire\VenueDetail;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;



/*
|--------------------------------------------------------------------------
| STATIC PAGES (Public)
|--------------------------------------------------------------------------
*/
Route::get('/clear-session', function () {
    session()->flush();
    return redirect('/')->with('message', 'You have been logged out.');
})->name('clear-session');
Route::get('/logins', Login::class)->name('logins');
// Route::get('/register', Login::class)->name('register');
Route::get('/register', Register::class)->name('registers');
// Route::get('/details-center/{slug}', [CategoryController::class, 'show'])->name('center.show');
Route::get('/details-center/{slug}', [DetailsCenterController::class, 'details_center'])->name('center.show');

Route::view('/', 'home.index')->name('home');
Route::view('/home', 'home.index')->name('homes');

// Route::view('/about', 'about-us')->name('about-us');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about-us');
Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact_us');
Route::view('/categories', 'category')->name('category');
Route::view('/dash', 'dash')->name('dash');
Route::view('/vedio', 'vedio')->name('vedio');
Route::view('/faqs', 'faq')->name('faqs');
Route::view('/descrept', 'descrept')->name('reviews');

// Route::view('/about-cat', 'about-cat-us');
Route::view('/signup', 'signup');
Route::view('/login1', 'login1');
Route::view('/tutor', 'tutor');

// Route::get('/login', Login::class)->name('login');

/*
|--------------------------------------------------------------------------
| CATEGORY ROUTES
|--------------------------------------------------------------------------
*/
// routes/web.php
Route::get('/categories', CategoryManager::class)->name('categories');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/list_category', [CategoryController::class, 'category'])->name('category.list');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');


/*
|--------------------------------------------------------------------------
| COURSE ROUTES
|--------------------------------------------------------------------------
*/
// Route::get('/courses', [CourseController::class, 'index'])
//     ->name('courses.index');

Route::middleware('apiauth')->group(function () {
    Route::get('/categories', CategoryManager::class)->name('categories');
});

// ONLINE course page
// Route::get('/course/{course:slug}', [CourseController::class, 'showOnline'])
//     ->name('courses.online');

// // PHYSICAL course page
// Route::get('/center/{center}/{course:slug}', [CourseController::class, 'showCenter'])
//     ->name('courses.center');

// Route::get('/course/{course}/watch', [CourseWatchController::class, 'CourseWatch'])
//     ->middleware(['auth'])
//     ->name('course.watch');
Route::get('/course/{slug}/watch', [CourseWatchController::class, 'CourseWatch'])
    ->name('course.watch');
Route::get('/course/{course}', [CourseController::class, 'showOnline'])
    ->name('courses.online')
    ->where('course', '[a-z0-9-]+'); // slug format: my-course-slug

Route::get('/center/{center}/{course}', [CourseController::class, 'showCenter'])
    ->name('courses.center')
    ->where('course', '[a-z0-9-]+');

// ONLINE course page (single course)
// Route::prefix('course')->group(function () {
//     Route::get('/{course}', [CourseController::class, 'showOnline'])
//         ->name('courses.online');
// });

// // HYBRID/PHYSICAL courses based on centers
// Route::prefix('center')->group(function () {
//     Route::get('/{center}/{course}', [CourseController::class, 'showCenter'])
//         ->name('courses.center');
// });

// Course watching page (guarded)




/*
|--------------------------------------------------------------------------
| COURSE ENROLLMENT (PAYSTACK)
|--------------------------------------------------------------------------
*/

Route::get('/enroll/paystack/{slug}', [CourseController::class, 'buy'])->name('enroll.course');



/*
|--------------------------------------------------------------------------
| VENUE ROUTES (LIVEWIRE)
|--------------------------------------------------------------------------
*/

Route::get('/venues', VenueList::class)->name('venues');

// detail page
Route::get('/venues/{slug}', VenueDetail::class)->name('venues.show');



/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['sessionauth'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::view('profile2', 'profile2')
      ->middleware(['sessionauth', 'users'])
    ->name('profile2');

    Route::get('/my-course', [CourseController::class, 'mycourse'])
     ->middleware(['sessionauth'])
    ->name('my.course');

    Route::get('/my-videos', [MyVideosController::class, 'index'])
    ->middleware(['sessionauth', 'admin'])
    ->name('my.videos');

    Route::get('/draftvideo', [MyVideosController::class, 'draft'])
    ->middleware(['sessionauth', 'admin'])   
    ->name('courses.no-video');

     Route::get('/our-center', [CenterController::class, 'centers'])
  ->name('center.centers');
});



/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/

// Route::fallback(function () {
//     return view('errors.404');
// });


// require __DIR__.'/auth.php';
