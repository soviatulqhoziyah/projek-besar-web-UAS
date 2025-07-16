<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SoviaEventController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SoviaTicketController;
use App\Http\Controllers\SoviaPembayaranController;
use App\Http\Controllers\Admin\SoviaBeasiswaController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\Admin\BeasiswaController as AdminBeasiswaController;




// ⇢ Kunjungan pertama langsung ke beranda
Route::get('/', function () {
    return view('home.beranda');
})->name('home.beranda');

// Alias lama (boleh hapus kalau tak dipakai)
Route::get('/beranda', function () {
    return view('home.beranda');
});

// ⇢ HALAMAN YANG BUTUH $events (dulu root “/”)
Route::get('/homepage', [SoviaEventController::class, 'index'])
    ->name('home.homepage');

// Detail satu event
Route::get('/sovia-events/{id}', [SoviaEventController::class, 'show'])
    ->name('home.detail');
    
Route::get('/admin/kontak', [KontakController::class, 'kontak'])
->middleware('auth')
->name('admin.kontaks.index');


// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('home.kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.kirim');

/* -----------------------------------------------------------
|  AUTH
|------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');      
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
/* -----------------------------------------------------------
|  ADMIN ‑ only
|------------------------------------------------------------
*/

Route::middleware(['auth', AdminRoleMiddleware::class])->group(function () {

    // data_events (link di sidebar, misalnya)
    Route::get('/admin/data_events', [AdminController::class, 'data'])
        ->name('admin.data_events');

    // POST logout di dalam area admin
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('home.beranda')
            ->with('success', 'Berhasil logout!');
    })->name('logout');

    Route::middleware(['auth', AdminRoleMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/data_events', [AdminController::class, 'data'])
            ->name('data_events');

        // CRUD full SoviaEventController  (/admin/events/…)
        Route::resource('events', SoviaEventController::class)
            ->parameters(['events' => 'id'])
            ->names('events');

        // POST logout (duplikat bawaan Anda – tetap dipertahankan)
        Route::post('/logout', function () {
            Auth::logout();
            return redirect()->route('home.beranda')
                ->with('success', 'Berhasil logout!');
        })->name('logout');
    });
    Route::middleware(['auth', AdminRoleMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'destroy']);
    });
    Route::get('/admin', [UserController::class, 'index']);
    Route::get('/admin/pendaftars', [PendaftaranController::class, 'index'])
    ->middleware('auth')
    ->name('admin.pendaftars.index');

});

Route::get('/beasiswa/{id}', [BeasiswaController::class, 'show'])->name('beasiswa.show');
Route::get('/beasiswa/{id}/edit', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
Route::put('/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
Route::delete('/beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');


//ADMIN
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('beasiswa', BeasiswaController::class);
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('beasiswa', BeasiswaController::class);
});

//ADMIN
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('beasiswa', BeasiswaController::class);
});
Route::middleware(['auth', AdminRoleMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('beasiswa', BeasiswaController::class);
});
Route::get('/admin/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');

//BEASISWA
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('home.beasiswa');
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('home.beasiswa');
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('home.beasiswa');
Route::get('/beasiswa/{id}', [BeasiswaController::class, 'show'])->name('home.beasiswa.detail');

//ADMIN
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/data_beasiswa', SoviaBeasiswaController::class);
});

// Route::get('/admin/data_beasiswa', [BeasiswaController::class, 'index'])
//     ->middleware('auth')
//     ->name('admin.data_beasiswa');


//PENDAFTARAN DAN PEMBAYARAN
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'form'])->name('pendaftaran.form');
Route::post('/pendaftaran/{id}', [PendaftaranController::class, 'submit'])->name('pendaftaran.submit');
Route::get('/pembayaran/create/{pendaftar_id}', [SoviaPembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran', [SoviaPembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/tiket/{pendaftar_id}', [SoviaTicketController::class, 'show'])->name('tiket.show');

Route::get('/admin/pendaftars', [PendaftaranController::class, 'index'])
    ->middleware('auth')
    ->name('admin.pendaftars.index'); 

Route::get('/admin/pembayarans', [SoviaPembayaranController::class, 'index'])
    ->middleware('auth')
    ->name('admin.pembayarans.index');
