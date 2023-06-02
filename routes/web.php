<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


Route::prefix('auth')->group(function () {
    Route::get('/{provider}/redirect', [ProviderController::class, 'redirect' ]);
    Route::get('/{provider}/callback', [ProviderController::class, 'callback' ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/upload', [UploadController::class, 'index'])->name('front.upload');
    Route::post('/upolad', [UploadController::class, 'insert'])->name('submit.upload');
    Route::get('/orders/all', [UploadController::class, 'viewAllOrders'])->name('all.clientorder');
    Route::get('/orders/view/{id}', [UploadController::class, 'view'])->name('view.singleorder');
    Route::get('/orders/view/{id}', [UploadController::class, 'view'])->name('view.singleorder');
    // Route::post('/delete', [UploadController::class, 'softDelete'])->name('order.softdelete');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin/users')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/',[UserController::class, 'index'])->name('all.users');
    // Route::get('/view', [UserController::class, 'view'])->name('view.user');
    
});

Route::prefix('admin/users')->middleware(['auth', 'isSuperAdmin'])->group(function () {
    // Route::get('/add',[UserController::class, 'add'])->name('add.user');
    // Route::get('/edit', [UserController::class, 'edit'])->name('edit.user');
});

Route::prefix('admin/roles')->middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::get('/',[UserRoleController::class, 'index'])->name('all.roles');
    // Route::get('/add',[UserController::class, 'add'])->name('add.user');
    // Route::get('/edit', [UserController::class, 'edit'])->name('edit.user');
    // Route::get('/view', [UserController::class, 'view'])->name('view.user');
    
});

Route::prefix('admin/clients')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/',[ClientsController::class, 'index'])->name('all.clients');
    // Route::get('/add',[ClientsController::class, 'add'])->name('add.client');
    // Route::get('/edit', [ClientsController::class, 'edit'])->name('edit.client');
    // Route::get('/view', [ClientsController::class, 'view'])->name('view.client');
    
});

Route::prefix('admin/orders')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/',[OrdersController::class, 'index'])->name('all.orders');
    Route::get('/view/{id}', [OrdersController::class, 'view'])->name('view.order');
    Route::post('/update', [OrdersController::class, 'update'])->name('update.order');
    // Route::get('/delete', [OrdersController::class, 'delete'])->name('delete.order');
    
});



require __DIR__.'/auth.php';
