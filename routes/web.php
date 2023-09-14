<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; 
use App\Models\user;
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
    return view('welcome');
    // $tampil = user::all();
    // $tampil = user::where('id',1)->get();
    // $tampils = DB::table('users')->get();
    // $tambah = user::create([
    //     'name'  =>  'hadeh',
    //     'email' =>  'hadeh@gmail.com',
    //     'password' => bcrypt('puki'),
    // ]);
    // $update = user::find(4);
    // $update->update(['email'=>'dumdxyz@gmail.com']);

    // $delete = user::find(4)->delete();
    // $delete = user::where('id',2)->delete();
    // dd($tambah);
});
  
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
