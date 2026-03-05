<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ColocationJoinController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckBanned;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
  return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', CheckBanned::class])->group(function () {

  /*
  |--------------------------------------------------------------------------
  | User Dashboard
  |--------------------------------------------------------------------------
  */
  Route::get('/dashboard', function () {
    $colocations = auth()->user()
      ->colocations()
      ->with('categories')
      ->get();

    return view('colocation.dashboard', compact('colocations')); // ✅ تأكد من اسم الفيو
  })->name('dashboard');


  /*
  |--------------------------------------------------------------------------
  | Profile Routes
  |--------------------------------------------------------------------------
  */
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


  /*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  */
  Route::middleware(AdminMiddleware::class)->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
      ->name('admin.dashboard');

    Route::post('/admin/user/{user}/ban', [AdminController::class, 'ban'])
      ->name('admin.user.ban');

    Route::post('/admin/user/{user}/unban', [AdminController::class, 'unban'])
      ->name('admin.user.unban');
  });


  /*
  |--------------------------------------------------------------------------
  | Colocation Routes
  |--------------------------------------------------------------------------
  */
  Route::get('/colocation/create', [ColocationController::class, 'create'])
    ->name('colocation.create');

  Route::post('/colocation/store', [ColocationController::class, 'store'])
    ->name('colocation.store');

  Route::get('/colocation/{colocation}/workspace', [ColocationController::class, 'workspace'])
    ->name('colocation.workspace');

  Route::post('/colocation/{colocation}/categories', [ColocationController::class, 'addCategory'])
    ->name('colocation.add-category');


  /*
  |--------------------------------------------------------------------------
  | Expenses Routes
  |--------------------------------------------------------------------------
  */
  Route::get('/colocation/{colocation}/expenses', [ExpensesController::class, 'index'])
    ->name('expenses.index');

  Route::get('/colocation/{colocation}/expenses/create', [ExpensesController::class, 'create'])
    ->name('expenses.create');

  Route::post('/colocation/{colocation}/expenses', [ExpensesController::class, 'store'])
    ->name('expenses.store');

  Route::post('/expense/{expense}/pay', [ExpensesController::class, 'pay'])
    ->name('expense.pay');


  /*
  |--------------------------------------------------------------------------
  | Join Colocation
  |--------------------------------------------------------------------------
  */
  Route::get('/colocation/join', [ColocationJoinController::class, 'showForm'])
    ->name('colocation.join');

  Route::post('/colocation/join', [ColocationJoinController::class, 'join'])
    ->name('colocation.join.submit');

});

require __DIR__ . '/auth.php';