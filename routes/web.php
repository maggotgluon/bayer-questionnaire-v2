<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Livewire\Client\Index as clientIndex;
use App\Livewire\Client\QuizPMDD as QuizPMDD;
use App\Livewire\Client\QuizHormonalAcne as QuizHormonalAcne;
use App\Livewire\Client\QuizHighTestosterone as QuizHighTestosterone;

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

// Route::view('/', 'welcome')->name('home');
Route::get('/', clientIndex::class)->name('home');

Route::get('/quiz/1/{client}', QuizPMDD::class)->name('QuizPMDD');
Route::get('/quiz/2/{client}', QuizHormonalAcne::class)->name('QuizHormonalAcne');
Route::get('/quiz/3/{client}', QuizHighTestosterone::class)->name('QuizHighTestosterone');


Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::get('/notification', function () {
    // $response = Password::broker()->sendResetLink(['email' => 'admin@admin.com']);
    $mail = (new Illuminate\Notifications\Messages\MailMessage)
                ->mailer('smtp')
                ->subject('test')
                ->greeting('Hello!')
                ->line('One of your invoices has been paid!')
                ->lineIf(1 > 0, "Amount paid: 1")
                ->action('View Invoice', '#')
                ->line('Thank you for using our application!');
    // dd($mail);
    return $mail;
});
