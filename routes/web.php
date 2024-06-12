<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumnos', AlumnoController::class)->only('index');



Route::get('/add-select-demo', [AlumnoController::class, 'addSelectDemo']);
Route::get('/distinct-demo', [AlumnoController::class, 'distinct']);
Route::get('/select-raw-demo', [AlumnoController::class, 'selectRaw']);
Route::get('/where-raw-demo', [AlumnoController::class, 'whereRaw']);
Route::get('/aggregate', [AlumnoController::class, 'aggregateFunctions']);
Route::get('/group-by-gender', [AlumnoController::class, 'groupByGender']);
Route::get('/group-by-demo', [AlumnoController::class, 'groupBy']);
