<?php

use Illuminate\Support\Facades\Route;
use App\Models\PhotoSlider;

use App\Http\Controllers\PhotoSliderController;

use App\Http\Controllers\UserContactFormController;

use App\Http\Controllers\AdminContactFormController;

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

/* -------------------fronend routes---------------------- */

Route::get('/', function () {
    $photos = PhotoSlider::all();
    return view('welcome')->with(compact('photos'));
});
Route::get('/about', function () { return view('about'); });

Route::post('/anyPath', [UserContactFormController::class, 'storeUserMessage'])->name('contact.store');


/* ----------------Admin Routes-------------------- */

Route::resource('admin/photoslider', PhotoSliderController::class);

Route::resource('admin/contactForm', AdminContactFormController::class);
Route::get('admin/contactForm/markAsRead?{$id}', [AdminContactFormController::class, 'markAsRead'])->name('markAsRead');