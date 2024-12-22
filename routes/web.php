<?php

use App\Http\Controllers\beritacontroller;
use App\Http\Controllers\siswacontroller;
use Illuminate\Support\Facades\Route;

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
});


Route::get('/data-siswa', [siswacontroller::class, 'index'])->name('siswa.index');
Route::get('/data-siswa/create', [siswacontroller::class, 'create'])->name('siswa.create');
Route::post('/data-siswa/store', [siswacontroller::class, 'store'])->name('siswa.store');
Route::get('/data-siswa/{id}/edit', [siswacontroller::class, 'edit'])->name('siswa.edit');
Route::patch('/data-siswa{id}/update', [siswacontroller::class, 'update'])->name('siswa.update');
Route::delete('/data-siswa{id}/destroy', [siswacontroller::class, 'destroy'])->name('siswa.destroy');

{
Route::get('images/{folder}/{filename}',function ($folder, $filename) {
    $path = storage_path('app/images/' . $folder. '/' . $filename);
    if (!file_exists($path)) {
        abort(500);
    }
    $file = File_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('content_type','$type');
})->name('show-image');
Route::get('/berita', [beritacontroller::class, 'index'])->name('berita.index');
Route::get('/berita/create', [beritacontroller::class, 'create'])->name('berita.create');
Route::post('/berita/store', [beritacontroller::class, 'store'])->name('berita.store');
Route::get('/berita/{slug}/show', [beritacontroller::class, 'show'])->name('berita.show');
Route::get('/berita/{slug}/edit', [beritacontroller::class, 'edit'])->name('berita.edit');
Route::patch('/berita/{slug}/update', [beritacontroller::class, 'update'])->name('berita.update');
Route::delete('/berita/{slug}/destroy', [beritacontroller::class, 'destroy'])->name('berita.destroy');
}