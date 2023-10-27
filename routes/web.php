<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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
Route::get('/counter', Counter::class);
//Volt::route('/counter', 'counter_volt');
Route::get('/docx', function () {

    $file = Storage::get('template2.docx');
    $file_contents = ($file);
    return response($file_contents)
        ->header('Cache-Control', 'no-cache private')
        ->header('Content-Description', 'File Transfer')
        ->header('Content-Type', 'application/msword'/*$file->type*/)
        ->header('Content-length', strlen($file_contents))
        ->header('Content-Disposition', 'attachment; filename=' . 'test.docx' /*$file->name*/)
        ->header('Content-Transfer-Encoding', 'binary');
//
//    return response()->download(storage_path() . '/sample.docx');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
