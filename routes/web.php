<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('owner.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('cabangs', \App\Http\Controllers\CabangController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);

    Route::get('/owner/dashboard', function () {

        $totalCabang = \App\Models\Cabang::count();
        $totalBarang = \App\Models\Barang::count();
        $totalTransaksi = \App\Models\Transaksi::count();
        $totalPegawai = \App\Models\User::count();

        $totalManajer = \App\Models\User::role('manajer')->count();

        $cabangTerbaru = \App\Models\Cabang::latest()->take(5)->get();

        return view('owner.dashboard', compact(
            'totalCabang',
            'totalBarang',
            'totalTransaksi',
            'totalPegawai',
            'totalManajer',
            'cabangTerbaru'
        ));

    })->name('owner.dashboard');

    Route::get('/manajer/dashboard', function () {
        return view('manajer.dashboard');
    })->name('manajer.dashboard');

    Route::get('/supervisor/dashboard', function () {
        return view('supervisor.dashboard');
    })->name('supervisor.dashboard');

    Route::get('/kasir/dashboard', function () {
        return view('kasir.dashboard');
    })->name('kasir.dashboard');

    Route::get('/gudang/dashboard', function () {
        return view('gudang.dashboard');
    })->name('gudang.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
