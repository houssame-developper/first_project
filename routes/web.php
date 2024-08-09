<?php

use App\Http\Controllers\Admin\CategoryControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class,"main"])->name("home");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
Route::middleware('admin')->group(function () {
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryControler::class);
Route::get("/admin/dashboard",[AdminController::class,'index'])->name("admin_dashboard");
});
Route::middleware(['editor'])->group(function () {
    Route::get("/editor/dashboard",[EditorController::class,'index'])->name("editor_dashboard");;
    });

Auth::routes();
require __DIR__.'/auth.php';
