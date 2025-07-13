<?php

use App\Livewire\Team;
use Livewire\Livewire;
use App\Livewire\About;
use App\Livewire\Index;
use App\Livewire\Contact;
use App\Livewire\Courses;
use App\Livewire\Blog;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Http\Controllers\OpenApiController;
use App\Http\Controllers\Swagger\AuthSwaggerController;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Index::class)->name('index');
Route::get('/about', About::class)->name('about');
Route::get('/courses', Courses::class)->name('courses');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/register', Register::class)->name('register');
Route::post('/midtrans/callback', [MidtransWebhookController::class, 'handle']);
Route::get('/bayar-kursus/{id}', [\App\Http\Controllers\BayarKursusController::class, 'index'])->name('bayar.kursus');
Route::post('/midtrans/callback', [\App\Http\Controllers\MidtransCallbackController::class, 'manual']);
Route::get('/ping', [OpenApiController::class, 'ping']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'registerDoc']);
