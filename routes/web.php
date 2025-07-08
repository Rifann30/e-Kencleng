<?php

// use App\Mail\WelcomeMail;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\JamaahController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\UserProfilController;
// use App\Http\Controllers\PengambilanController;
// use App\Http\Controllers\PengeluaranController;
// use App\Http\Controllers\Auth\RegisterController;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;
// use App\Models\User;
// use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

// use App\Http\Controllers\Auth\PasswordResetLinkController;


// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('logout-user', function(){
//     Auth::logout();
//     return redirect('/');
// })->name('logout-user');

// Route::get('/', function(){
//     return view('welcome');
// });

// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/cetakSaldo', [DashboardController::class, 'cetakSaldo'])->name('cetakSaldo');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::ResetLinkSent
//         ? back()->with(['status' => __($status)])
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');

// Route::get('/reset-password/{token}', function (string $token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');



// Route::post('/reset-password', [PasswordResetLinkController::class, 'reset'])
//     ->name('password.update');

// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:3|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function (User $user, string $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));

//             $user->save();

//             event(new PasswordReset($user));
//         }
//     );

//     return $status === Password::PasswordReset
//         ? redirect()->route('login')->with('status', __($status))
//         : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');

// Route::get('/send-welcome-mail', function() {
//     $data = [
//         'email' => 'contoh@email.com',
//         'password' => 123
//     ];
//     Mail::to('aaa@gmail.com')->send(new WelcomeMail($data));
// });

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Route::group(['Middleware' =>['auth', 'userAkses:admin']], function() {
//     Route::resource('userprofil', UserProfilController::class);
// });

// Route::group(['Middleware' =>['auth', 'userAkses:admin,takmir']], function() {
//     Route::resource('pengeluaran', PengeluaranController::class);
//     Route::get('cetakPengeluaran', [PengeluaranController::class, 'cetak'])->name('pengeluaran.cetak');
// });

// Route::group(['Middleware' =>['auth', 'userAkses:admin,remas']], function() {
//     Route::resource('pengambilan', PengambilanController::class);
//     Route::post('/pengambilan-temp/toggle', [PengambilanController::class, 'toggleTemp'])->name('pengambilan.temp.toggle');
//     Route::post('/pengambilan-temp/clear', [PengambilanController::class, 'clearKelompokTemp'])->name('pengambilan.temp.clear');
// });

// Route::group(['Middleware' =>['auth', 'userAkses:admin,takmir,remas']], function() {
//     Route::get('home', [HomeController::class, 'index'])->name('home');
//     Route::resource('jamaah', JamaahController::class);
//     Route::get('cetakJamaah', [JamaahController::class, 'cetak'])->name('jamaah.cetak');
// });






use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserProfilController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\PengeluaranController;



// Auth Routes
Route::get('logout-user', function () {
    Auth::logout();
    return redirect('/');
})->name('logout-user');

Route::get('/', function(){
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Guest Routes
Route::group(['Middleware' =>['guest']],function () {
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetLinkController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetLinkController::class, 'reset'])->name('password.update');
});

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cetakSaldo', [DashboardController::class, 'cetakSaldo'])->name('cetakSaldo');

// Protected Routes
Route::group(['Middleware' =>['auth', 'userAkses:admin']], function() {
    Route::resource('userprofil', UserProfilController::class);
});

Route::group(['Middleware' =>['auth', 'userAkses:admin,takmir']], function() {
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::get('cetakPengeluaran', [PengeluaranController::class, 'cetak'])->name('pengeluaran.cetak');
});

Route::group(['Middleware' =>['auth', 'userAkses:admin,remas']], function() {
    Route::resource('pengambilan', PengambilanController::class);
    Route::post('/pengambilan-temp/toggle', [PengambilanController::class, 'toggleTemp'])->name('pengambilan.temp.toggle');
    Route::post('/pengambilan-temp/clear', [PengambilanController::class, 'clearKelompokTemp'])->name('pengambilan.temp.clear');
});

Route::group(['Middleware' =>['auth', 'userAkses:admin,takmir,remas']], function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('jamaah', JamaahController::class);
    Route::get('cetakJamaah', [JamaahController::class, 'cetak'])->name('jamaah.cetak');
});

// Test Email
Route::get('/send-welcome-mail', function () {
    $data = [
        'email' => 'contoh@email.com',
        'password' => 123
    ];
    Mail::to('aaa@gmail.com')->send(new WelcomeMail($data));
});
