<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('create');
});


#Route::get('/User/create', function () {
  #  return view('create');
#});

#Route::post('/User/create', 'UserController@store')->name('route_users.store');

Route::resource('users', UserController::class);

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::get('users/create/{locale}', function($locale) {
if(in_array($locale, ['ar','en'])){
  session()->put('locale', $locale);
}

return redirect()->back();
})->name('langConvertor');