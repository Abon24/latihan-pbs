<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa;
use App\Models\MMahasiswa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route untuk tampil data
Route::get("/view",[Mahasiswa::class, 'viewData']);

//Route untuk tambah data
Route::post("/save", [Mahasiswa::class, 'saveData']);

//Route untuk delete data
Route::delete("/delete/{npm}", [Mahasiswa::class, 'deleteData']);

//Route untuk edit data
Route::put("/edit/{npm}", [Mahasiswa::class,'editable']);
