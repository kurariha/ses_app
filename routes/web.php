<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Models\Project;

Route::get('/', [ProjectController::class, 'index'])
    ->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('projects', ProjectController::class)
    ->except(['create'])
    ->middleware('auth');


Route::resource('projects.contacts', ContactController::class)
    ->middleware('auth');

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {
    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])
        ->name('admin.login');

    Route::post('login', [AdminLoginController::class, 'login']);

    // プロフィール
    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [AdminProfileController::class, 'edit'])
            ->name('admin.profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])
            ->name('admin.profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])
            ->name('admin.profile.destroy');
    });
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // ログイン後の画面: ミドルウェアをauth:adminに適用
    Route::middleware(['auth:admin'])->group(function () {
        // /admin にアクセスしたら AdminProjectController@index を呼ぶ
        Route::get('/', [AdminProjectController::class, 'index'])
            ->name('admin.index');

        Route::middleware(['auth:admin'])->group(function () {
            Route::resource('projects', AdminProjectController::class);
        });
    });
});
