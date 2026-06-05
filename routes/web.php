<?php

use Illuminate\Support\Facades\Route;
use App\Models\Medicine;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; 

// Login and Registration
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        $totalMedicines = Medicine::count();

        $lowStock = Medicine::where('quantity', '<=', 10)->count();

        $expired = Medicine::where('expiration_date', '<', now())->count();

        return view('dashboard', compact(
            'totalMedicines',
            'lowStock',
            'expired'
        ));
    });

    Route::get('/medicines', [MedicineController::class, 'index']);

    Route::get('/medicines/create', [MedicineController::class, 'create']);

    Route::post('/medicines/store', [MedicineController::class, 'store']);

    Route::get('/medicines/edit/{id}', [MedicineController::class, 'edit']);

    Route::post('/medicines/update/{id}', [MedicineController::class, 'update']);

    Route::get('/medicines/delete/{id}', [MedicineController::class, 'destroy']);

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::post('/profile/update', [ProfileController::class, 'update']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::post('/users/update/{id}', [UserController::class, 'update']);
    Route::get('/users/delete/{id}', [UserController::class, 'destroy']);

});