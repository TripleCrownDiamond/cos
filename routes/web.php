<?php

use App\Http\Livewire\Dashboard\Partners\Partners;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard.overview');
})->name('dashboard')->middleware('auth');

// Route::get('/addpartner', function () {
//     return view('dashboard.partners.addpartner');
// })->name('addpartner')->middleware('auth');

// Route::get('/partners', function () {
//     return view('dashboard.partners.managepartners');
// })->name('partners')->middleware('auth');

Route::group([
    "middleware" => ["auth"],
    'as' => 'auth.'
], function(){

    Route::group([
        "prefix" => "users",
        'as' => 'users.'
    ], function(){

        Route::get("/partners", Partners::class)->name("partners.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //

    });

    Route::group([
        "prefix" => "formulas",
        'as' => 'formulas.'
    ], function(){

        Route::get("/formulas", App\Http\Livewire\Dashboard\Formulas\FormulasList::class)->name("formulas.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        //

    });
});

//Route::get("/addpartner", AddPartner::class)->middleware('auth')->name('partners.add');


    




