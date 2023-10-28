<?php

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

Route::get('/docs', function () {
    return view('docs.index');
});

Route::get('/test_report', function () {
    return view('reports.newman');
});


// Route::get('/', function () {
//     return json_encode("API Health OK");
// });
