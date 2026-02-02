<?php

use App\Http\Controllers\AdminController;
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
use App\Livewire\Admin\AdminCentersList;
use App\Livewire\Category\CategoryManager;
use App\Livewire\Category\CategorynewManager;
use App\Livewire\Course\NoVideoCourses;
use App\Livewire\CourseWatch;
use App\Livewire\VenueList;
use App\Livewire\VenueDetail;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\AdminCourseList;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminUserList;
use App\Livewire\Admin\AdminVideoList;


/*
|--------------------------------------------------------------------------
| STATIC PAGES (Public)
|--------------------------------------------------------------------------
*/

Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
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
//http://127.0.0.1:8000/enroll/paystack/how-to-cook
Route::middleware('apiauth')->group(function () {
    Route::get('/categories', CategoryManager::class)->name('categories');
});

// ONLINE course page
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
 Route::view('/user-enroll', 'courses.userenroll')
      ->middleware(['sessionauth', 'admin'])
    ->name('enrolled.courses');

Route::middleware(['sessionauth'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::view('profile2', 'profile2')
      ->middleware(['sessionauth', 'users'])
    ->name('profile2');

    Route::get('/my-course', [CourseController::class, 'mycourse'])
     ->middleware(['sessionauth', 'admin'])
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




// Import other components as needed...

Route::prefix('admin')->middleware(['sessionauth', 'super'])->group(function () {
    
    // Dashboard (Optional)
Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');

    // Course Moderation Route
    Route::get('/courses', [AdminController::class, 'course'])
        ->name('admin.courses.index');

    Route::get('/centers', [AdminController::class, 'center'])
        ->name('admin.centers.index');

    // Video Moderation Route (The piece we just built)
    Route::get('/videos', [AdminController::class, 'video'])
        ->name('admin.videos.index');

    Route::get('/users', [AdminController::class, 'users'])
        ->name('admin.users.index');

    // Add more routes here for Users, Settings, etc.
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
