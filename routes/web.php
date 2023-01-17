<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GetjobController;
use App\Http\Controllers\Mahasiswa\GetjobMhsController;
use App\Http\Controllers\PetanidashController;
use App\Http\Controllers\ProfilemhsController;
use App\Http\Controllers\MahasiswaDashController;
use App\Http\Controllers\Petani\PetaniController;
// use App\Http\Controllers\Mahasiswa\SigninController;
// use App\Http\Controllers\Mahasiswa\RegisterController;
use App\Http\Controllers\ProfilepetaniController;
use App\Http\Controllers\Petani\CreatejobController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;


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
Route::get('/', [HomeController::class, 'index']);


    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::get('/register', [MahasiswaController::class, 'registermhs']);
        Route::post('/register', [MahasiswaController::class, 'store']);

        Route::get('/signinmahasiswa', [MahasiswaController::class, 'signinmhs']);
        Route::post('/signinmahasiswa', [MahasiswaController::class, 'authenticate']);
    });

    Route::middleware(['auth:web',])->group(function(){
        Route::get('/mahasiswa', [MahasiswaDashController::class, 'index']);
        Route::post('/searchMHS', [MahasiswaDashController::class, 'search']);
        Route::post('/logout', [MahasiswaController::class, 'logout']);

        Route::resource('/profilmhs', ProfilemhsController::class);
        Route::get('/editprofilmhs', [ProfilemhsController::class, 'edit'])->name('edit');
        Route::patch('/updateprofilmhs/{id}', [ProfilemhsController::class, 'update'])->name('update');

        Route::get('/editpassmhs', [ProfilemhsController::class, 'editpass'])->name('editpass');
        Route::post('/editpassmhs', [ProfilemhsController::class, 'updatepass'])->name('editpass');

        Route::resource('/getjob', GetjobMhsController::class);
        Route::get('/detailjob/{slug}', [GetjobMhsController::class, 'detail_job']);
    });

    // ROUTES FOR PETANI ROLE'S
    Route::get('/registerpetani', [PetaniController::class, 'registerpetani']);
    Route::post('/registerpetani', [PetaniController::class, 'store']);
    Route::get('/signinpetani', [PetaniController::class, 'signinpetani']);
    Route::post('/signinpetani', [PetaniController::class, 'authenticate']);
    Route::get("/petani",[PetanidashController::class,'index']);
    Route::resource('/profilpetani', ProfilepetaniController::class);
    Route::get('/editprofilpetani', [ProfilepetaniController::class, 'edit'])->name('edit');
    Route::post('/updateprofilpetani', [ProfilepetaniController::class, 'update_profile'])->name('update');
    Route::resource('/createjob', CreatejobController::class);
    Route::get('/createjob', [CreatejobController::class,'index']);
    Route::post('/createjob', [CreatejobController::class,'store']);
    Route::get('/logoutpetani', [PetaniController::class, 'logout']);
    Route::get('/detail/{slug}', [PetanidashController::class, 'detail_job']);
    Route::get('/editpost/{slug}', [CreatejobController::class, 'edit']);
    Route::post('/editpost/{slug}', [CreatejobController::class, 'edit_store']);
    Route::post('/deletepost', [CreatejobController::class, 'destroy']);
    Route::get('/editpasspetani', [ProfilepetaniController::class, 'editpass']);
    Route::post('/editpasspetani', [ProfilepetaniController::class, 'editpassStore']);
    Route::post('/petanisearch', [PetanidashController::class, 'search']);