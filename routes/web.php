<?php
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
Route::get('/allFiles', [FileController::class, 'index'])->name('file.index');

// Go to Create Page
Route::get('/file/create', [FileController::class, 'create'])->name('file.create');

// Store Data
Route::post('/file/store', [FileController::class, 'store'])->name('file.store');
Route::get('/file/store', [FileController::class, 'store'])->name('file.store');


// Edit Data
Route::get('/file/edit/{id}', [FileController::class, 'edit'])->name('file.edit');

// Update Data
Route::post('/file/update/{id}', [FileController::class, 'update'])->name('file.update');

// Delete Data
Route::get('/file/delete/{id}', [FileController::class, 'destroy'])->name('file.destroy');

Route::resource('files', FileController::class);

//show
Route::get('/file/show/{id}', [FileController::class, 'show'])->name('file.show');

//Download
Route::get('/file/download/{id}', [FileController::class, 'download'])->name('file.download');
