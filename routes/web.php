



<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;




use App\Http\Controllers\OrganiserDashboardController;


// Public routes
Route::get('/', function () {
    return view('homePage');
}); 



Route::get('/about', function () {
    return view('about');
}); 


Route::get('/contact', function () {
    return view('contact');
}); 




Route::get('/bookings', function () {
    return view('mybookings');
}); 




Route::get('/register', [AuthController::class, 'showSignUp'])->name('register');

Route::post('/register', [AuthController::class, 'signUp']);

Route::get('/attendees', [AuthController::class, 'getAttendeeList'])->name('attendees');
Route::get('/login', [AuthController::class, 'showSignIn'])->name('login');
Route::post('/login', [AuthController::class, 'signIn']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('events', EventController::class)->middleware('auth');



Route::get('/attende/dashboard', function() {
    return 'Organiser Dashboard';
})->middleware(['auth'])->name('attende.dashboard');

Route::get('/organiser/dashboard', function () {
    return view('organiser.dashboard');
});



Route::get('/organiser/createEvent', function () {
    return view('organiser.createEvent');
});



Route::get('/organiser/settings', function () {
    return view('organiser.settings');
});


Route::get('/organiser/myEvents', function () {
    return view('organiser.show_events');
});
    
    